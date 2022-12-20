<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $token app\models\UserEmailConfirmToken */

$confirmLink = 'https://usrv.io/confirm-change-password?token='.$token->new_email_token;
?>
Hello <?= $user->username ?>,

Click the link below to confirm the change of email address:

<?= $confirmLink ?>
