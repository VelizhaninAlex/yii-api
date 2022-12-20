<?php

namespace app\controllers;

class PostController extends ActiveController
{
    private $pageSize = 6;
    public array $sort = ['date'=>SORT_DESC];
    public $modelClass = 'app\models\Post';
}
