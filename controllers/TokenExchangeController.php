<?php

namespace app\controllers;

use app\models\TokenExchange;
use Yii;
use app\components\mail\mail;
use Exception;

class TokenExchangeController extends ActiveController
{
    public $modelClass = 'app\models\TokenExchange';

    protected function verbs(){
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'view' => ['GET'],
            'index'=>['GET','POST'],
        ];
    }

    public function actionCreateEmail()
    {
        $model = new $this->modelClass();
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            $model->save();
            try {

                mail::SendEmail(
                    [
                        'htmlLayout' => "layouts/presale-html",
                        'useFileTransport' => false,
                        'view' =>
                            [
                                'html' => 'tokenExchange'

                            ],
                        'params' =>
                            ['sum' => Yii::$app->request->post('sum')]
                        ,
                        'EmailFrom' => ['info@usrv.io'],
                        'EmailTo' => Yii::$app->request->post('email'),
                        'Subject' => 'Обмен токенов ' . \Yii::$app->name
                    ]
                );
                return ['success'=>true,'msg'=>'TOKEN_EXCHANGE_SUCCESS'];
            } catch (Exception $exception) {
                return ['success'=>true,'msg'=>'SOMETHING_WENT_WRONG'];
            }
        }else{
                return ['success'=>false,'msg'=>'FILL_ALL_FIELDS'];
        }

    }

}
