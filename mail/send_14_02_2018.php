<?php

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>
?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">
        <p style="color:#555555;font-size:14px;">
            <?php
            if(Yii::$app->language=='ru-RU')
            {
                echo 'Мы приняли решение дополнительно сжечь 360 млн. токенов команды Uservice. 
                Это делается для создания справедливой пропорции между участниками и организаторами токенсейла. 
                После сжигания на развитие проекта у команды остается 40 из 400 первоначальных млн. UST.';
            }
            else
            {
                echo 'We decided to additionally destroy 360 millions of the Uservice team tokens. 
                We are doing this to create a fair proportion of tokens between the participants and the organizers of the token sale. 
                After destroying the additional tokens, the team will have 40 million tokens out of the 400 million initial UST tokens.';
            }
                ?>

        </p>

        <p style="color:#555555;font-size:14px;">

            <?=Yii::t('mail','Best regards,'); ?><br>
            <?=Yii::t('mail','Uservice team'); ?>
        </p>

        <p style="text-align: center;">
            <img src="https://usrv.io/img/mail/burn.jpg" width="500px" height="500px">
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




