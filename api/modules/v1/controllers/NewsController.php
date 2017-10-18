<?php


namespace api\modules\v1\controllers;

use yii\rest\Controller;

class NewsController extends Controller
{
    public function actionIndex()
    {
        return [
            ['title' => '党的十九大正在召开'],
            ['title' => '人民幸福指数杠杠的'],
        ];
    }
}