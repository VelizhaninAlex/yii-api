<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $token app\models\UserEmailConfirmToken */
$confirmLink = 'https://usrv.io/confirm-email?token='.$token->new_email_token;

?>

<tr>
    <td style="color:#555555;padding:5px 46px;text-align:left;">
        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Hello</h2>
        <p style="color:#555555;font-size:15px;">
            Thank you for your interest in Uservice - global decentralized blockchain platform for auto industry.
        </p>
        <p style="color:#555555;font-size:15px;">
            'For email confirmation, please click the link here: <?= Html::a(Html::encode($confirmLink), $confirmLink) ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            Sincerely,<br>Uservice Team
        </p>
    </td>
</tr>
