<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $token */
/* @var $password */
/* @var $email */

?>

<tr>
    <td style="color:#555555;padding:5px 46px;text-align:left;">
        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?=Yii::t('mail','Hello');?>,</h2>
        <p style="color:#555555;font-size:15px;">
            <?= Yii::t('mail','Thank you for your interest in Uservice - global decentralized blockchain platform for auto industry.');?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?= Yii::t('mail','Link to enter') ?>: <b><a target="_blank" href="https://partner.usrv.io">https://partner.usrv.io</a></b>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?= Yii::t('mail','Your login');?>: <b><?= $email ?></b>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?= Yii::t('mail','Your password');?>: <b><?= $password ?></b>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?= Yii::t('mail','Sincerely,<br>Uservice Team');?>
        </p>
    </td>
</tr>
