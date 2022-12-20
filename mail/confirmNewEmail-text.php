<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $token */

$confirmLink = 'https://usrv.io/confirm-email?token='.$token->new_email_token;

?>
Hello <?= $user->username ?>,

Click the link to confirm your email address:

<?= $confirmLink ?>
