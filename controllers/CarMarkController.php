<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class CarMarkController extends ActiveController
{
    public $modelClass = 'app\models\CarMark';

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this,'prep'];
        return $actions;
    }

    public function prep(){
        $model = new $this->modelClass;
        $query = $model::find();
        if (!empty(Yii::$app->request->get())) {
            if(!empty(Yii::$app->request->get('name'))){
                $query->andFilterWhere(['like','name',Yii::$app->request->get('name')]);
            }
            if(!empty(Yii::$app->request->get('id'))){
                $query->andFilterWhere(['=','id',Yii::$app->request->get('name')]);
            }
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,

        ]);
    }
}
