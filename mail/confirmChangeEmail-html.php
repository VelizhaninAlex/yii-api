<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $token app\models\UserEmailConfirmToken*/

$confirmLink = 'https://usrv.io/confirm-change-password?token='.$token->new_email_token;
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Click the link below to confirm the change of email address:</p>

    <p><?= Html::a(Html::encode($confirmLink), $confirmLink) ?></p>
</div>
