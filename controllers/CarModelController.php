<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;

class CarModelController extends ActiveController
{
    public $modelClass = 'app\models\CarModel';


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
            if(!empty(Yii::$app->request->get('mark_id'))){
                $query->andFilterWhere(['=','mark_id',Yii::$app->request->get('mark_id')]);
            }
        }

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,

        ]);
    }
}
