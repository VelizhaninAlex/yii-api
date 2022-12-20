<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $token app\models\UserPasswordResetToken*/

$resetLink = 'https://usrv.io/?reset-password='.$token->token;
?>
'Hello', <?= $user->username ?>

<?='To reset your password, please click the link below:'?>

<?= $resetLink ?>
