<?php
namespace app\models\forms;

use app\modules\users\models;
use yii\base\InvalidParamException;
use yii\base\Model;
use app\models\UserPasswordResetToken;
use Yii;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $password_repeat;

    /**
     * @var app\models\UserPasswordResetToken
     */
    public $token;

    public $_token = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_repeat','token'], 'required'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' =>'NEW_PASSWORD',
            'password_repeat' =>'NEW_PASSWORD_REPEAT',
            'token' => 'TOKEN',
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $this->getToken();
        if ($this->_token !== false) {
            $this->_token->user->setPassword($this->password);

            return ($this->_token->user->save() && $this->_token->delete());
        }
        return false;
    }

    public function getToken()
    {
        if ($this->_token === false) {
            $this->_token = UserPasswordResetToken::findOne([
                'token' => $this->token
            ]);
        }

        return $this->_token;
    }
}
