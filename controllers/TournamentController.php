<?php

namespace app\controllers;

class TournamentController extends ActiveController
{
    private $pageSize = 6;
    public $modelClass = 'app\models\Tournament';
}
