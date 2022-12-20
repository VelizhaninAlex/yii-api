<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $token */
/* @var $password */
/* @var $email */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm-email', 'token' => $token]);

?>
'Hello

Click the link to confirm your email address:

Your login: <?= $email ?>

Your password: <?= $password ?>

<?= $confirmLink ?>
