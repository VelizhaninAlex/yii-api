<?php
namespace app\models\forms;

use app\components\mail\mail;
use app\models\User;
use app\models\UserPasswordResetToken;
use yii\base\Model;
use Yii;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'USER_WITH_SUCH_EMAIL_DO_NOT_EXISTS'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        $user = $this->user;
        if (!$user) {
            return false;
        }

        mail::SendEmail(
            [
                'htmlLayout' => "layouts/presale-html",
                'textLayout'=> '@app/mail/passwordResetToken-text',
                'useFileTransport' => false,
                'view' =>
                    [
                        'html' => '@app/mail/passwordResetToken-html'

                    ],
                'params' =>
                    ['user' => $user, 'token' => $this->token]
                ,
                'EmailFrom' => ['info@usrv.io'],
                'EmailTo' => $this->email,
                'Subject' => 'Password reset for ' . \Yii::$app->name
            ]
        );
        return true;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne([
                'status' => User::STATUS_ACTIVE,
                'email' => $this->email,
            ]);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'email' =>'EMAIL',
        ];
    }

    public function getToken()
    {
        $user = $this->user;

        $token = UserPasswordResetToken::findOne([
            'user_id' => $user->id
        ]);

        if ($token == null) {
            $token = new UserPasswordResetToken;
            $token->user_id = $user->id;
            $token->token = $user->generatePasswordResetToken();
            $token->save();
        }

        return $token;
    }
}
