<?php

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>

//$wallet
//$ourwallet
//$value
?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">

        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?=Yii::t('mail','Hello');?>!</h2>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Thank you for your attention. Uservice is a global decentralized blockchain platform for the auto industry.'); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','To confirm your wallet {wallet} send the following amount {value} to the purse {ourwallet}. Please note that this amount is refundable.',
                [
                    'wallet'=>$wallet,
                    'value'=>$value,
                    'ourwallet'=>$ourwallet,
               ]); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Best regards,'); ?><br>
            <?=Yii::t('mail','Uservice team'); ?>
        </p>


    </td>
</tr>
