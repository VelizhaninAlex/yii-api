<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\components\mail\mail;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_NEW = 'NEW';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_BLOCKED = 'BLOCKED';
    const STATUS_DELETE = 'DELETE';

    const SEX_MALE = 'MALE';
    const SEX_FEMALE = 'FEMALE';

    public $password;

    public function getDefaultPhoto()
    {
        return ($this->sex == self::SEX_MALE) ? 'male' : 'female';
    }

    public static function getSexArray()
    {
        return [
            self::SEX_MALE   => '',
            self::SEX_FEMALE => Yii::t('users', 'SEX_FEMALE'),
        ];
    }

    public static function getStatusArray()
    {
        return [
            self::STATUS_NEW     => Yii::t('users', 'STATUS_NEW'),
            self::STATUS_ACTIVE  => Yii::t('users', 'STATUS_ACTIVE'),
            self::STATUS_BLOCKED => Yii::t('users', 'STATUS_BLOCKED'),
            self::STATUS_DELETE  => Yii::t('users', 'STATUS_DELETE'),

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['username'], 'required'],
            [['username', 'email', 'auth_key', 'password_hash'], 'string', 'max' => 255],
            [['status', 'sex'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['phone','telegram','second_name','wallet'], 'string', 'max' => 255],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            [
                'status',
                'in',
                'range' => [self::STATUS_NEW, self::STATUS_ACTIVE, self::STATUS_BLOCKED, self::STATUS_DELETE]
            ],
            ['sex', 'in', 'range' => [self::SEX_MALE, self::SEX_FEMALE]],
            [['password', 'phone', 'first_name', 'last_name'], 'safe'],
            [['token','vip'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'username'      => 'USERNAME',
            'email'         => 'EMAIL',
            'sex'           => 'SEX',
            'status'        => 'STATUS',
            'created_at'    => 'CREATED_AT',
            'updated_at'    => 'UPDATED_AT',
            'password_hash' => 'PASSWORD',
            'password'      => 'PASSWORD',
            'telegram'      => 'TELEGRAM',
            'second_name'      => 'SECOND_NAME',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $email
     * @return mixed
     */
    public static function findByEmailOrUserName($email)
    {
        return static::find()->where(['and', 'status=:status', 'email=:email'],
            [':status' => self::STATUS_ACTIVE, ':email' => $email])->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return mixed
     */
    public static function findByUserName($username)
    {
        return static::find()->where(['and', 'status=:status', 'username=:username'],
            [':status' => self::STATUS_ACTIVE, ':username' => $username])->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status'               => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return ($this->password_hash != '' && Yii::$app->security->validatePassword($password, $this->password_hash));
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        return Yii::$app->getSecurity()->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getPasswordResetToken()
    {
        return $this->hasOne(UserPasswordResetToken::className(), ['user_id' => 'id']);
    }

    public function createEmailConfirmToken($needConfirmOldEmail = false)
    {
        $token = new UserEmailConfirmToken;
        $token->user_id = $this->id;
        $token->new_email = $this->email;
        $token->new_email_token = Yii::$app->security->generateRandomString();
        $token->new_email_confirm = 0;

        if ($needConfirmOldEmail) {
            $token->old_email_token = Yii::$app->security->generateRandomString();
            $token->old_email_confirm = 0;
            $token->old_email = $this->oldAttributes['email'];
        }

        return $token->save();
    }

    public function sendEmailConfirmationMail($view, $toAttribute, $r = null)
    {
        mail::SendEmail(
            [
                'htmlLayout' => "layouts/presale-html",
                'textLayout'=> $view . '-text',
                'useFileTransport' => false,
                'view' =>
                    [
                        'html' => $view . '-html'

                    ],
                'params' =>
                        ['user' => $this, 'token' => $this->emailConfirmToken, 'r' => $r]
                    ,
                'EmailFrom' => ['info@usrv.io'],
                'EmailTo' => $this->emailConfirmToken->{$toAttribute},
                'Subject' => 'Email confirmation for ' . \Yii::$app->name
            ]
        );
        return true;
    }

    public function getEmailConfirmToken()
    {
        return $this->hasOne(UserEmailConfirmToken::className(), ['user_id' => 'id']);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}
