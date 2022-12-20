<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use Yii;
use yii\helpers\ArrayHelper;

class CarYearController extends ActiveController
{
    public array $sort = ['id'=>SORT_ASC];
    public $modelClass = 'app\models\CarYear';

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this,'prep'];
        return ArrayHelper::merge(parent::actions(),$actions);
    }

    public function prep(): ActiveDataProvider
    {
        $query = $this->getCarQueryFilter();
        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,

        ]);
    }
}
