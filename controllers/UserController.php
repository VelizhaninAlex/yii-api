<?php

namespace app\controllers;

use app\models\forms\ChangeEmailForm;
use app\models\forms\ChangePasswordForm;
use app\models\forms\RetryConfirmEmailForm;
use app\models\UserEmailConfirmToken;
use app\models\forms\LoginForm;
use app\models\forms\PasswordResetRequestForm;
use app\models\forms\ResetPasswordForm;
use app\models\forms\SignupForm;
use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use  yii\web\Cookie;
use app\models\UserRefreshToken;
use app\models\User;

class UserController extends \yii\web\Controller
{


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionLogin() {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->login()) {
            $user = Yii::$app->user->identity;
            return [
                'user' => $user,
            ];
        } else {
            return ['success'=>false,'msg'=>'WRONG_LOGIN_OR_PASSWORD'];
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return ['success'=>true];
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            $transaction = Yii::$app->db->beginTransaction();
            if ($user = $model->signup()) {
                if ($user->createEmailConfirmToken() && $user->sendEmailConfirmationMail('confirmNewEmail', 'new_email')) {
                    $transaction->commit();
                    return ['success'=>true,'msg'=>'REGISTRATION_SUCCESS'];
                } else {
                    $transaction->rollBack();
                    return ['success'=>false,'msg'=>'USER_NOT_CONFIRMED'];
                }
            }
            else {
                $transaction->rollBack();
                return ['success'=>false,'msg'=>'EMAIL_EXISTS'];
            }
        }
        return [$model];
    }

    public function actionRetryConfirmEmail()
    {
        $model = new RetryConfirmEmailForm;
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            if ($model->user->sendEmailConfirmationMail('confirmNewEmail', 'new_email')) {
                return ['success'=>true,'msg'=>'MAIN_WAS_SENT'];
            }
        }else{
            return ['success'=>false,'msg'=>'SOMETHING_GET_WRONG'];
        }

    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm;
        if ($model->load(Yii::$app->request->post(),'')) {
            if ($model->sendEmail()) {
               return ['success'=>true, 'msg'=>'MAIN_WAS_SENT'];
            } else {
                return ['success'=>false, 'msg'=>'USER_NOT_FOUND_OR_NOT_ACTIVATED'];
            }
        }
        return ['success'=>false,'msg'=>'SOMETHING_GET_WRONG'];
    }

    public function actionResetPassword()
    {
        $model = new ResetPasswordForm();
        $model->load(Yii::$app->request->post(),'');
        if ($model->resetPassword()) {
            return ['success'=>true,'msg'=>'PASSWORD_CHANGED'];
        }else{
            return ['success'=>false,'msg'=>'SOMETHING_GET_WRONG'];
        }
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity;
        $changePasswordForm = new ChangePasswordForm;
        $changeEmailForm = new ChangeEmailForm;

        if ($model->load(Yii::$app->request->post(),'') && $model->save()) {
            return ['success'=>true];
        }
        if ($model->password_hash != '') {
            $changePasswordForm->scenario = 'requiredOldPassword';
        }

        if ($changePasswordForm->load(Yii::$app->request->post()) && $changePasswordForm->validate()) {
            $model->setPassword($changePasswordForm->new_password);
            if ($model->save()) {
               return ['success'=>true,'msg'=>'PASSWORD_CHANGED'];
            }
        }

        if ($changeEmailForm->load(Yii::$app->request->post()) && $changeEmailForm->validate() && $model->setEmail($changeEmailForm->new_email)) {
            return ['success'=>true,'msg'=>'MAIL_SUCCESS'];
        }

    }

    public function actionConfirmEmail()
    {
        $token = Yii::$app->request->post('token');
        $tokenModel = UserEmailConfirmToken::findToken($token);
        if($tokenModel){
            if($tokenModel->confirm($token))
                return ['success'=>true,'msg'=>'EMAIL_TOKEN_CONFIRMED'];
        }else{
            return ['success'=>false,'msg'=>'EMAIL_TOKEN_EXPIRED'];
        }

        return ['success'=>false];
    }

    /**
     * @throws yii\base\Exception
     */
    private function generateRefreshToken(\app\models\User $user, \app\models\User $impersonator = null): UserRefreshToken {
        $refreshToken = Yii::$app->security->generateRandomString(200);

        // TODO: Don't always regenerate - you could reuse existing one if user already has one with same IP and user agent
        $userRefreshToken = new UserRefreshToken([
            'urf_userID' => $user->id,
            'urf_token' => $refreshToken,
            'urf_ip' => Yii::$app->request->userIP,
            'urf_user_agent' => Yii::$app->request->userAgent,
            'urf_created' => gmdate('Y-m-d H:i:s'),
        ]);
        if (!$userRefreshToken->save()) {
            throw new \yii\web\ServerErrorHttpException('Failed to save the refresh token: '. $userRefreshToken->getErrorSummary(true));
        }

        // Send the refresh-token to the user in a HttpOnly cookie that Javascript can never read and that's limited by path
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'usrv-token',
            'value' => $refreshToken,
            'httpOnly' => true,
            'sameSite' => 'none',
            'secure' => true,
            'path' => '/user/generate-refresh-token',  //endpoint URI for renewing the JWT token using this refresh-token, or deleting refresh-token
        ]));

        return $userRefreshToken;
    }
}
