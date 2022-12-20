<?php
/**
 * Created by PhpStorm.
 * User: bcs-204-34
 * Date: 10.11.17
 * Time: 15:12
 */

namespace app\components\Locales;

use Yii;
use yii\base\BaseObject;
use app\models\Languages;
use yii\helpers\ArrayHelper;


class Locales extends BaseObject
{

    public $flag=true;

    public $language;

    public $Languages;

    public $acceptlanguage;

    public $route;

    public $parameters;

    public $url;

    public function init()
    {
        parent::init();

        if(!isset($this->parameters['lang']))
        {
            $this->parameters['lang']='en';
        }

        $this->language=Yii::$app->language;

     }

    public static function Locale(array $array=[])
    {

        $locales=new self($array);

        $cookies = Yii::$app->request->cookies;


        if (($cookie = $cookies->get('lang')) !== null)
        {
            $locales->language=$cookie->value;

            if($locales->route=='site/index')
            {
                $Languages=$locales->getLanguages($locales->language);


                if ($Languages!=$locales->parameters['lang'])
                {
                    $locales->flag=false;
                    if ($Languages!='en')
                    {
                        $locales->url=['site/index','lang'=>$Languages];
                    }
                    else
                    {
                        $locales->url=['site/index'];
                    }
                }
            }
        }
        else
        {
            if (isset(Yii::$app->request->getHeaders()['accept-language']))
            {
                $locales->acceptlanguage=Yii::$app->request->parseAcceptHeader(Yii::$app->request->getHeaders()['accept-language']);
            }
            else
            {
                $locales->acceptlanguage['en']=['q'=>1];
            }

            $locales->Languages=$locales->getLanguagesAndName(array_keys($locales->acceptlanguage));

            if(count($locales->Languages)<1)
            {
                $locales->language=$locales->getName('en');
                if($locales->route=='site/index')
                {
                    if ('en'!=$locales->parameters['lang'])
                    {
                        $locales->flag=false;
                        $locales->url=['site/index'];

                    }
                }
                  $locales->setCookie($locales->language);
            }


            if(isset($locales->Languages['ru']))
            {
                $locales->language=$locales->getName('ru');
                if($locales->route=='site/index')
                {
                    if ('ru'!=$locales->parameters['lang'])
                    {
                        $locales->flag=false;
                        $locales->url=['site/index','lang'=>'ru'];

                    }
                }
                $locales->setCookie($locales->language);
            }
            else
            {
                if(count($locales->Languages)==1)
                {
                    $key=key($locales->Languages);
                    $locales->language=$locales->getName($key);
                    if($locales->route=='site/index')
                    {
                        if ($key!=$locales->parameters['lang'])
                        {
                            $locales->flag=false;
                            if($key=='en')
                            {
                                $locales->url=['site/index'];
                            }
                            else
                            {
                                $locales->url=['site/index','lang'=>$key];
                            }
                        }
                    }
                    $locales->setCookie($locales->language);
                }
                else
                {
                    foreach ($locales->acceptlanguage as $key=>$val)
                    {
                        if (isset($locales->Languages[$key]))
                        {
                            $locales->language=$locales->getName($key);

                            if($locales->route=='site/index')
                            {
                                if ($key!=$locales->parameters['lang'])
                                {
                                    $locales->flag=false;
                                    if($key=='en')
                                    {
                                        $locales->url=['site/index'];
                                    }
                                    else
                                    {
                                        $locales->url=['site/index','lang'=>$key];
                                    }

                                }
                            }
                            $locales->setCookie($locales->language);
                            break;
                        }
                    }
                }
            }
        }

        Yii::$app->params['Languages']=ArrayHelper::map(
            Languages::find()
                ->select(['name','language'])
                ->where(['status'=>1])
                ->createCommand(Yii::$app->db)
                ->queryAll()
            ,'name',
            'language'
        );

        Yii::$app->params['lang']=$locales->getLanguages($locales->language);

        Yii::$app->params['widget_id']=$locales->getWidgetId($locales->language);

        $locales->setLanguages();

       return $locales;
    }

    public function getLanguages($language)
    {
        return Languages::find()->select(['name'])->where(['status'=>1,'language'=>$language])->createCommand(Yii::$app->db)->queryScalar();
    }

    public function getWidgetId($language)
    {
        return Languages::find()->select(['widget_id'])->where(['status'=>1,'language'=>$language])->createCommand(Yii::$app->db)->queryScalar();
    }


    public function setLanguages()
    {
        Yii::$app->language=$this->language;
    }
    //     $Languages=Yii::$app->getRequest()->getAcceptableLanguages();


    public function getLanguagesAndName($language)
    {
        return ArrayHelper::map(
            Languages::find()
                ->select(['name','language'])
                ->where(['status'=>1])
                ->andWhere(['language'=>$language])
                ->orWhere(['name'=>$language])
                ->createCommand(Yii::$app->db)
                ->queryAll()
            ,'name',
            'language'
        );
    }

    public function getName($name)
    {
        return Languages::find()->select(['language'])->where(['status'=>1,'name'=>$name])->createCommand(Yii::$app->db)->queryScalar();
    }

    public function setCookie($language)
    {
        Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'lang',
            'value' => $language,
            'expire'=>time()+60*60*24*30*12,
            'path'=>'/',
            'httpOnly'=>1,

        ]));
    }

    /*  Yii::$app->response->cookies->add(new \yii\web\Cookie([
      'name' => 'lang',
      'value' => 'en-US',
      'expire'=>time()+60*60*24*30,
      'path'=>'/',
      'domain'=>'.uservice.com',
      'httpOnly'=>1,
  ]));
*/
}