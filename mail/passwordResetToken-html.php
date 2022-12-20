<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $token \app\models\UserPasswordResetToken*/

$resetLink = 'https://usrv.io/?reset-password='.$token->token;
?>

<tr>
    <td style="color:#555555;padding:5px 46px;text-align:left;">
        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?='Hello'?>,</h2>
        <p style="color:#555555;font-size:15px;">
            <?= 'Thank you for your interest in Uservice - global decentralized blockchain platform for auto industry.'?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=  'To restore your password, please click the link here:' ?> <?= Html::a(Html::encode($resetLink), $resetLink) ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?= 'Sincerely,<br>Uservice Team'?>
        </p>
    </td>
</tr>