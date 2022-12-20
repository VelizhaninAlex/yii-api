<?php

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>
?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">

        <p style="color:#555555;font-size:14px;">
            <?php
            if(Yii::$app->language=='ru-RU')
            {
                ?>
                Самая специфичная автомобильная техника БелАЗ продается за биткоины — доступный самосвал можно взять за 10 биткоинов,
                а монстра 7510 за 643. Автоиндустрия оживает в направлении криптовалют, а это значит, что впереди технологичное будущее
                и то, что мы идем в правильном направлении > <a href="https://usrv.io/">usrv.io</a>, чат > <a href="https://t.me/userviceico">https://t.me/userviceico</a>
                <?php
            }
            else
            {
                ?>
                Now, you can buy unique BelAZ equipment for Bitcoins: you can purchase a dump truck for 10 bitcoins or the monstrous BelAZ-7510 for 643 bitcoins.
                The auto industry is taking steps into the world of cryptocurrency, it means that technological future is ahead of us, and that we are moving in
                the right direction > <a href="https://usrv.io/">usrv.io</a>, chat > <a href="https://t.me/userviceico">https://t.me/userviceico</a>
                <?php
            }
                ?>
        </p>

        <p style="color:#555555;font-size:14px;">

            <?=Yii::t('mail','Best regards,'); ?><br>
            <?=Yii::t('mail','Uservice team'); ?>
        </p>


        <p style="color:#555555;font-size:14px; text-align: center">
            <a href="https://usrv.io/" style="text-decoration: none;"><span style="background:#ffa500; padding: 5px 20px; border-radius:3px; color: #ffffff; font-weight: bold;">
               <?php
                    if (Yii::$app->language=='ru-RU')
                    {
                        echo 'Перейти на сайт';
                    }
                    else
                    {
                        echo 'Go to website';
                    }
                ?>
                </span></a>
        </p>
    </td>
</tr>






