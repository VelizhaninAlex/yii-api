<?php

namespace app\commands;

use Yii;
use app\models\User;
use yii\console\Controller;
use app\components\mail\mail;

class CronController extends Controller
{

    public function actionSend()
    {
        $User = User::find()->select(['id', 'email'])
            ->where(['status' => 'ACTIVE','email'=>'a.velizhanin@ya.ru'])
            ->limit(200)
            ->orderBy(['id' => SORT_ASC])->all();


        $i = 0;
        Yii::$app->language = 'en-US';
        $name='usrv.io';

        $title = 'Latest news about USERVICE project';

        foreach ($User as $key => $val) {

            $print = mail::SendEmail(
                [
                    'htmlLayout' => 'layouts/presale-html',
                    //  'textLayout'=>'layouts/presale-text',
                    'useFileTransport' => false,
                    'view' =>
                        [
                            'html' => 'nu-1078' //17042018

                        ],
                    'params' =>
                        [
                            'title' => $title,
                            'name' => $name,
                        ],
                    'EmailFrom' => ['info@usrv.io' => $name],
                    'EmailTo' => $val->email,//$val->email,//'d.17@mail.ru',//$val->email,///'alexander19790301@gmail.com',
                    'Subject' => $title
                ]
            );

            if ($print) {
                $i++;
            }

        }

        echo "\n";
        echo 'Отослано - ';
        print_r($i);
        echo "\n";
    }

    public function actionSend05122022()
    {
        $User = User::find()->select(['id', 'email'])
            ->where(['status' => 'ACTIVE'])
            ->orderBy(['id' => SORT_ASC])->all();


        $i = 0;
        Yii::$app->language = 'ru-RU';
        $name='usrv.io';

        $title = 'Свершилось! Встречайте обновлённый сайт Uservice';

        foreach ($User as $key => $val) {

            $print = mail::SendEmail(
                [
                    'htmlLayout' => 'layouts/presale-html',
                    //  'textLayout'=>'layouts/presale-text',
                    'useFileTransport' => false,
                    'view' =>
                        [
                            'html' => 'send_05_12_2022'

                        ],
                    'params' =>
                        [
                            'title' => $title,
                            'name' => $name,
                        ],
                    'EmailFrom' => ['info@usrv.io' => $name],
                    'EmailTo' => $val->email,//$val->email,//'d.17@mail.ru',//$val->email,///'alexander19790301@gmail.com',
                    'Subject' => $title
                ]
            );

            if ($print) {
                $i++;
            }

        }

        echo "\n";
        echo 'Отослано - ';
        print_r($i);
        echo "\n";
    }
}

?>