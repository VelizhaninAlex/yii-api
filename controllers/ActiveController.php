<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class ActiveController extends \yii\rest\ActiveController
{
    private int $pageSize = 0;

    public array $sort = ['id'=>SORT_DESC];

    private array $excludedParams = [
        'page',
        'per-page'
    ];

    private function getDBFilters(): array
    {
        return $this->removeExcerptParams(Yii::$app->request->get());
    }

    private function removeExcerptParams(array $params): array
    {
        foreach ($this->excludedParams as $excludedParam){
            unset($params[$excludedParam]);
        }
        return $params;
    }

    public function actions()
    {
        return ArrayHelper::merge(
            parent::actions(),
            [
                'index' => [
                    'prepareDataProvider' => function ($action) {
                        $modelClass = $action->modelClass;
                        return Yii::createObject([
                            'class' => ActiveDataProvider::className(),
                            'query' => $modelClass::find()->where($this->getDBFilters())->orderBy($this->sort),
                            'pagination' => [
                                'pageSize' => $this->pageSize,
                            ],
                            'sort'=> ['defaultOrder' => $this->sort],
                        ]);
                    },
                ],
            ]
        );
    }

    public function getCarQueryFilter(){
        $model = new $this->modelClass;
        $query = $model::find();
        if (!empty(Yii::$app->request->get())) {
            if(!empty(Yii::$app->request->get('name'))){
                $query->andFilterWhere(['like','name',Yii::$app->request->get('name')]);
            }
            if(!empty(Yii::$app->request->get('id'))){
                $query->andFilterWhere(['=','id',Yii::$app->request->get('id')]);
            }
        }
        return $query;
    }
}
