<?php

namespace app\controllers;

use Yii;
use app\models\UserCars;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;

class UserCarsController extends ActiveController
{
    public $modelClass = 'app\models\UserCars';
    public $fields = [
        'front' => 'front_view',
        'back' => 'back_view',
        'left' => 'left_view',
        'right' => 'right_view',
    ];

    protected function verbs(){
        return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'view' => ['GET'],
            'index'=>['GET','POST'],
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::className(),
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }


    public function actionCreateImages()
    {
        if(empty(UserCars::findOne(['user_id'=>Yii::$app->request->post('user_id')]))){
            $model = new $this->modelClass();
        }else{
            $model = UserCars::findOne(['user_id'=>Yii::$app->request->post('user_id')]);
        }
        if ($model->load(Yii::$app->request->post(),'') && $model->validate()) {
            if($this->saveImages($model)){
                return ['success'=>true,'msg'=>'SAVE_CAR_SUCCESS'];
            }
        }elseif (!($model->back && $model->front && $model->left && $model->right)){
            return ['success'=>false,'msg'=>'FILL_PHOTOS'];
        }else{
            return ['success'=>false,'msg'=>'FILL_ALL_FIELDS'];
        }
    }

    public function saveImage($model,$imageField,$linkField){
            $image_parts = explode(";base64,", $model->$imageField);
            if(isset($image_parts[0]))
            $image_type_aux = explode("image/", $image_parts[0]);
            if(isset($image_type_aux[1]))
            $image_type = $image_type_aux[1];
            if(isset($image_parts[1]))
            $image_base64 = base64_decode($image_parts[1]);
            if(!empty($image_base64)){
                $file = 'uploads/user_' . $linkField . $model->user_id . '.' . $image_type;
                file_put_contents($file, $image_base64);
                $model->$linkField = '/'.$file;
            }
    }

    public function saveImages($model){
        foreach ($this->fields as $image => $link){
            $this->saveImage($model,$image,$link);
        }
        return $model->save();
    }
}
