<?php

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>
?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">


            <?php
            if(Yii::$app->language=='ru-RU')
            {
                ?>
                <p style="color:#555555;font-size:14px;">
                    Мы начали переговоры с представителями Mitsubishi Corparation в России.
                    Директор по корпоративному планированию Yano Takamasa и председатель правления Sawaii Norihiro приезжали
                    в наш офис для обсуждения долгосрочного партнерства и включения в экономические планы сервиса Uremont.com.
                    Продолжайте следить за новостями и узнайте, какие перспективы ждут нас в работе с мировым автопроизводителем.
                </p>
                <p style="color:#555555;font-size:14px;">
                    Наш чат: <a href="https://t.me/userviceru">https://t.me/userviceru</a>
                </p>


                <?php //https://t.me/userviceru
            }
            else
            {
                ?>
                <p style="color:#555555;font-size:14px;">
                    We started negotiations with representatives of Mitsubishi Corporation in Russia. Corporate Planning Director Yano Takamasa
                    and Board Chairman Sawaii Norihiro came to our office to discuss long-term partnership. Follow our news to find out more about
                    the prospects of working with the global automaker.
                </p>

                <p style="color:#555555;font-size:14px;">
                    More on <a href="https://usrv.io/">usrv.io</a> and in chats: <a href="https://t.me/userviceico">https://t.me/userviceico</a>
                </p>
                <?php
            }
                ?>
        

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






