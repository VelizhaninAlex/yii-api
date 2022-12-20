<?php
namespace app\models\forms;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            [['password'], 'required'],
        ];
    }

    public function checkMail()
    {
        $user = User::findOne(['email' => $this->email, 'status' => 'ACTIVE']);
        if($user){
            $this->addErrors(['email' => 'Email already exists']);
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => 'EMAIL',
            'password' => 'PASSWORD',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        $this->validate();

        $existUser = User::findOne(['email' => $this->email]);

        if($existUser){
            return null;
        }

        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->username=trim($this->email);
            $user->status = User::STATUS_NEW;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }

}
