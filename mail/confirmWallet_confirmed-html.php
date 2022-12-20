<?php

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>

?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">

        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?=Yii::t('mail','Hello');?>!</h2>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Thank you for your attention. Uservice is a global decentralized blockchain platform for the auto industry.'); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Your wallet was confirmed, the tokens are displayed in your personal account.'); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Best regards,'); ?><br>
            <?=Yii::t('mail','Uservice team'); ?>
        </p>


    </td>
</tr>
<hr>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">

        <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;"><?=Yii::t('mail','Hello',[],'ru-RU');?>!</h2>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Thank you for your attention. Uservice is a global decentralized blockchain platform for the auto industry.',[],'ru-RU'); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Your wallet was confirmed, the tokens are displayed in your personal account.',[],'ru-RU'); ?>
        </p>
        <p style="color:#555555;font-size:15px;">
            <?=Yii::t('mail','Best regards,',[],'ru-RU'); ?><br>
            <?=Yii::t('mail','Uservice team',[],'ru-RU'); ?>
        </p>


    </td>
</tr>