<?php
//use Yii;

/* @var $this Yii\web\View */
/* @var $user common\models\User */

$this->title=$title;
?>
<tr>
    <td style="color:#555555;padding:5px 46px;text-align:left;">
        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?=\Yii::t('mail','Good afternoon');?>,</h2>
        <p style="color:#555555;font-size:15px;">
            <?= \Yii::t('mail','Thank you for your interest in USERVICE, global decentralized blockchain platform for auto industry players.');?>
        </p>
    </td>
</tr>
<tr>
    <td style="color:#099900;padding:0 46px;text-align:left;">
        <p style="color:#099900;font-size:15px;margin-bottom:20px;">
            <?= \Yii::t('mail','Hurry to purchase UST tokens with a 50% bonus in the Presale stage from November 20th-December 17th, 2017.');  ?>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <h3 style="color:#555555;font-size:15px;margin-bottom:0;">
            <img style="padding-right: 5px; vertical-align: middle;padding-bottom: 4px;width:23px" src="https://usrv.io/images/icon_01.png" alt="telegram.png">  <?=\Yii::t('mail','HOW TO PAY'); ?>
        </h3>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:0;">
            <?= \Yii::t('mail','You can buy UST tokens on our platform by transferring the funds to the following wallet address or using the QR code:'); ?>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:12px 46px;text-align:left;">
        <a href="https://etherscan.io/address/<?=$ContractEther; ?>"><img style="padding-right: 5px; vertical-align: middle;padding-bottom: 4px;width:235px" src="https://usrv.io/img/ethereum-qr2.png" alt="telegram.png"></a>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <h3 style="color:#555555;font-size:14px;margin-bottom:0;">
            <img style="padding-right: 5px; vertical-align: middle;padding-bottom: 4px;width:23px" src="https://usrv.io/images/icon_02.png" alt="telegram.png"> <?=$ContractEther; ?>
        </h3>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:0;">
            <?=\Yii::t('mail','When making the payment, please indicate Gas Limited 300000 and Gwei 24. These data are needed for more efficient processing of your transaction.'); ?>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:15px;">
            <?=\Yii::t('mail','If you have further question, you can get familiar with'); ?> <a href="https://usrv.io/<?=\Yii::$app->language; ?>/manual.pdf" target="_blank" style="color:#23699b;"><?=\Yii::t('mail','the detailed instructions.'); ?> </a>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <h3 style="color:#555555;font-size:15px;margin-bottom:0;color:#ff6600;">
            <img style="padding-right: 5px; vertical-align: middle;padding-bottom: 4px;width:23px" src="https://usrv.io/images/Attention.png" alt="telegram.png"> <?=\Yii::t('mail','Notification'); ?>
        </h3>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:15px;">
            <?=\Yii::t('mail','Citizens of the USA and Singapore are not allowed to participate in our token sale. All received funds from the citizens of the above mentioned countries can be returned upon request (see the claim procedure in the offer).'); ?>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <h3 style="color:#555555;font-size:15px;margin-bottom:0;color:#ff6600">
            <?=\Yii::t('mail','IMPORTANT!'); ?>
        </h3>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:0px;">
            <?=\Yii::t('mail','Do not send EHT via crypto stock market or other people’s wallets. Use the same wallet that you want to receive tokens to. If you will be using mobile wallet applications or wallets of others, then you risk losing your tokens.'); ?>
        </p>
    </td>
</tr>

<tr>
    <td style="color:#555555;padding:0 46px;text-align:left;">
        <p style="color:#555555;font-size:15px;margin-bottom:0px;">
            <?=\Yii::t('mail','By participating in token sale, you agree with'); ?>  <a href="https://usrv.io/<?=\Yii::$app->language; ?>/terms-and-conditions.pdf" target="_blank" style="color:#23699b;"><?=\Yii::t('mail','the terms of the offer.'); ?></a>
        </p>
    </td>
</tr>

<tr>
    <td style="padding:11px 46px 20px;font-size:13px;">
        <p style="color:#555555"><?=\Yii::t('mail','Sincerely, Team USERVICE'); ?> </p>
    </td>
</tr>