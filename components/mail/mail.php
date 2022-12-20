<?php
/**
 * Created by PhpStorm.
 * User: bcs-204-34
 * Date: 22.11.17
 * Time: 12:52
 */

namespace app\components\mail;

use Yii;

class mail
{
    /**
     * @param array $array
     * @return bool
     */
     public static function SendEmail(array $array)
     {
         $view = null;

         $params = [];

         $mailer=Yii::$app->mailer;

         if (isset($array['htmlLayout']))
         {
             $mailer->htmlLayout=$array['htmlLayout'];
         }

         if (isset($array['textLayout']))
         {
             $mailer->textLayout=$array['textLayout'];
         }

         if (isset($array['useFileTransport']))
         {
             $mailer->useFileTransport=$array['useFileTransport'];
         }

         if (isset($array['view']))
         {
             $view=$array['view'];
         }

         if (isset($array['params']))
         {
             $params=$array['params'];
         }

         $mailer=$mailer->compose($view,$params);


         if (isset($array['EmailFrom']))
         {

             $mailer->setFrom($array['EmailFrom']);
         }
         else
         {
             $mailer->setFrom(Yii::$app->params['AdminFromEmail']);
         }

         if (isset($array['EmailTo']))
         {

             $mailer->setTo($array['EmailTo']);
         }
         else
         {
             $mailer->setTo(Yii::$app->params['AdminFromEmail']);
         }

         if (isset($array['Subject']))
         {

             $mailer->setSubject($array['Subject']);
         }
         else
         {
             $mailer->setSubject('Тестовое письмо или не указали Subject');
         }

         return $mailer->send();
     }
}