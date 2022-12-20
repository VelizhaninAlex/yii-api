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
                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Здравствуйте.</h2>
                <p style="color:#555555;font-size:15px;">
                    Новости, которые Вы могли пропустить:
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Скидка 50% только до конца этой недели.</h2>

                <p style="color:#555555;font-size:15px;">
                    Началась последняя неделя пресейла токенов UST. На прошедших выходных поведение курса основной мировой криптовалюты- биткоина
                    в значитильной мере пошатнуло уверенность  инвесторов в его постоянном росте. Токены UST, вопреки полностью виртуальному биткоину,
                    обладают гарантией в виде работающего и стремительно развивающегося бизнеса в их основе- самого крупного агрегатора автосервисов
                    в восточной Европе Uremont.com Платформа Uservice основывается на базе <a href="https://uremont.com/">Uremont.com</a>, но обладает
                    значительно большим потенциалом для развития. По обоснованным прогнозам, через год токен UST вырастет в цене в 150 раз. До конца
                    текущей недели вы можете увеличить эту цифру еще вдвое- до 17 декабря UST продается со скидкой 50%. Успейте купить UST по самому
                    выгодному курсу! Подробности на <a href="https://usrv.io/">usrv.io</a>.
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Как узнать, сколько у тебя UST токенов?</h2>

                <p style="color:#555555;font-size:15px;">
                    Короткая инструкция для наших инвесторов- как проверить ваш баланс UST токенов:</p>
                <p style="color:#555555;font-size:15px;"> 1. Зайдите в Ваш кошелек по адресу <a href="https://www.myetherwallet.com/">https://www.myetherwallet.com</a></p>
                <p style="color:#555555;font-size:15px;">   2. Ищите блок справа "Балансы токенов"</p>
                <p style="color:#555555;font-size:15px;">   3. Нажмите кнопку “Добавить свой токен“.</p>
                <p style="color:#555555;font-size:15px;">   4. В открывшейся форме введите:<br>
                    Адрес ERC20-контракта: 0xCDA4377806cb09f226Aa4840A9df8B5C2B7744EC<br>
                    Символьное обозначение токена: UST<br>
                    Количество дробных частей: 18<br>
                    Нажмите кнопку “Сохранить“.</p>
                <p style="color:#555555;font-size:15px;">     5. Теперь в Вашем кошельке на <a href="https://www.myetherwallet.com/">https://www.myetherwallet.com</a> вы видите количество ваших токенов UST</p>
                <p style="color:#555555;font-size:15px;">    Мы расширяем функционал сайта <a href="https://usrv.io/">usrv.io</a>, в ближайшие дни на нем добавится личный кабинет пользователя с
                    возможностью просмотра своего баланса. Следите за нашими обновлениями!
                </p>

                <p style="color:#555555;font-size:15px;">
                    Вы получили это письмо, потому что проявили интерес к покупке UST токенов Uservice - глобальной децентрализованной блокчейн-платформы для автомобильной
                    индустрии (<a href="https://usrv.io/">https://usrv.io</a>).
                </p>

                <p style="color:#555555;font-size:15px;">
                    C уважением,<br>
                    <?=$name ?>,<br>
                    Community manager,
                    Пишите мне в чат: <a href="https://t.me/userviceru">https://t.me/userviceru</a>
                </p>
                <?
            }
            else
            {
                ?>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">Hi!</h2>
                <p style="color:#555555;font-size:15px;">
                    We want to tell you a little bit more about our project:
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">
                    Our 50% discount will last only till the end of this week.
                </h2>

                <p style="color:#555555;font-size:15px;">
                    This week is the last week of our Pre-sale. Over the past weekend, the exchange rate of Bitcoin, the world's main cryptocurrency,
                    had the investors question their confidence in its constant growth. The UST tokens, unlike the virtual bitcoin, are based on <a href="https://uremont.com/">Uremont.com</a>,
                    the largest aggregator of car-care centers in Eastern Europe, which has a lot of potential for development, as a warranty.
                    According to well-founded forecasts, the UST token will grow 150 times in its price in a year.<br>
                    Until the end of this week the UST token is sold with a 50% discount. Get a chance to buy our Tokens for the best price. All the details on <a href="https://usrv.io/">usrv.io</a>.
                </p>

                <h2 style="padding:15px 0;font-size:18px;padding-bottom:0;margin-bottom:0;">How do I know how many UST tokens I have?</h2>

                <p style="color:#555555;font-size:15px;">
                    This is a short instruction for our investors on how to check your UST token balance:
                </p>
                <p style="color:#555555;font-size:15px;">
                    1. Go to your wallet at <a href="https://www.myetherwallet.com/">https://www.myetherwallet.com</a>
                </p>
                <p style="color:#555555;font-size:15px;">
                    2. Look for "Token balance" on the right
                </p>
                <p style="color:#555555;font-size:15px;">3. Click the "Add your Token" button.</p>
                <p style="color:#555555;font-size:15px;"> 4. In the form that appears, enter:<br>
                    ERC20 contract address: 0xCDA4377806cb09f226Aa4840A9df8B5C2B7744EC<br>
                    Symbolic designation of the token: UST<br>
                    The number of decimal places: 18<br>
                    Click the "Save" button.</p>

                <p style="color:#555555;font-size:15px;">  5. Now you see the number of your UST tokenst at <a href="https://www.myetherwallet.com/">https://www.myetherwallet.com</a></p>
                <p style="color:#555555;font-size:15px;">   We are expanding the functionality of the website <a href="https://usrv.io/">usrv.io</a>, in a few days we will add personalized accounts,
                    that enables you to see your balance. Follow us for more updates!
                </p>

                <p style="color:#555555;font-size:15px;">
                    We are always glad to answer any of your questions in our Telegram chat: <a href="https://t.me/userviceico">https://t.me/userviceico</a> and
                    chat on the site <a href="https://usrv.io/">https://usrv.io</a>.
                </p>

                <p style="color:#555555;font-size:15px;">
                    You received this letter because you showed interest in buying UST tokens. Uservice is a global decentralized blockchain platform
                    for the auto industry (<a href="https://usrv.io/">https://usrv.io</a>).
                </p>

                <p style="color:#555555;font-size:15px;">
                    Yours faithfully,<br>
                    <?=$name ?>,<br>
                    Community manager.
                </p>
                <?
            }
        ?>

    </td>
</tr>
