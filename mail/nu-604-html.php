<?php
use Yii;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$this->title=$title; // <a href="https://t.me/userviceru/">https://t.me/userviceru/</a>
?>
<tr>
    <td style="color:#555555;padding:5px 26px;text-align:left;">
        <?
            if(Yii::$app->language=='ru-RU')
            {
            ?>
                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Здравствуйте!</h2>
                <p style="color:#555555;font-size:15px;">
                    Вы получили это письмо, потому что проявили интерес к покупке UST токенов Uservice -
                    глобальной децентрализованной блокчейн-платформы для автомобильной индустрии (<a href="https://usrv.io">https://usrv.io</a>).
                </p>

                <p style="color:#555555;font-size:15px;">Хотим рассказать вам о новостях проекта:</p>
                <h2 style="padding:0;font-size:18px;padding-bottom:0;margin-bottom:0;">Uservice примет участие в блокчейн конференции BConference Abu Dhabi</h2>


                <p style="color:#555555;font-size:15px;">
                    Завтра, 7 декабря команда Uservice будет на конференции BConference Abu Dhabi. Мы представим нашу идею
                    по использованию блокчейна для построения глобальной платформы, объединяющей участников автоиндустрии
                    по всему миру. Тысячи профессионалов блокчейн направления, инвесторов, крипто энтузиастов могут познакомиться
                    с нашим проектом и задать свои вопросы.
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Темпы роста проекта Uservice</h2>

                <p style="color:#555555;font-size:15px;">
                    Проект Uservice за прошедший ноябрь вырос еще на 1 тысячу партнеров. Количество автосервисов, подключенных
                    к крупнейшему в Европе агрегатору автосервисов Uremont.com перешагнуло рубеж в 11 000.
                    Портал <a href="https://uremont.com/">Uremont.com</a> является основой для реализации блокчейн платформы Uservice.
                    Внушительный рост, который демонстрирует портал начиная с середины 2016 года дает отличный
                    потенциал для реализации новой платформы Uservice.
                </p>

                <p style="color:#555555;font-size:15px;">
                    Мы всегда рады ответить на Ваши вопросы в нашем телеграм-чате: <a href="https://t.me/userviceru">https://t.me/userviceru</a>
                    и чате на сайте <a href="https://usrv.io">https://usrv.io</a>.
                </p>

                <p style="color:#555555;font-size:15px;">
                    C уважением,<br>
                    <?=$name ?>,<br>
                    Uservice.
                </p>
                <?

            }
            else
            {
                ?>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Hi!</h2>
                <p style="color:#555555;font-size:15px;">
                    You received this letter because you showed interest in buying UST tokens.
                    Uservice is a global decentralized blockchain platform for the auto industry (<a href="https://usrv.io">https://usrv.io</a>).
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">We want to tell you a little bit more about the project:</h2>


                <p style="color:#555555;font-size:15px;">
                    Tomorrow, December 7, the Uservice team will attend the #BConference Abu Dhabi.
                    We are presenting our idea of using a #blockchain to build a global platform,
                    that unites auto industry participants around the world. Thousands of blockchain professionals,
                    investors, #crypto enthusiasts will get a chance to learn about our project and ask their questions.
                    <br>See you at the conference!
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Rates of growth of the Uservice project</h2>

                <p style="color:#555555;font-size:15px;">
                    During November Uservice project has grown by another 1,000 partners. The number of service stations connected to
                    the largest car service center aggregator in Europe, Uremont.com, has exceeded the threshold of 11 000.
                    <a href="https://uremont.com/">Uremont.com</a> is the basis for Uservice platform blockchain implementation.
                    The impressive growth demonstrated by Uremont since the middle of 2016 gives an excellent potential to implement
                    the new Uservice platform.
                </p>

                <p style="color:#555555;font-size:15px;">
                    We are always glad to answer any of your questions in our Telegram chat: <a href="https://t.me/userviceico">https://t.me/userviceico</a>
                    and chat on the site <a href="https://usrv.io">https://usrv.io</a>.
                </p>

                <p style="color:#555555;font-size:15px;">
                    Yours faithfully,<br>
                    <?=$name ?>,<br>
                    Uservice.
                </p>
                <?
            }
        ?>

    </td>
</tr>
