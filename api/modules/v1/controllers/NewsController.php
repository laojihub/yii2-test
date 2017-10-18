<?php

namespace api\modules\v1\controllers;

use yii\data\ArrayDataProvider;

class NewsController extends BaseController
{
    /**
     * 新闻列表
     *
     * @return ArrayDataProvider
     */
    public function actionIndex()
    {
        $news = [
            ['title' => '党的十九大正在召开'],
            ['title' => '人民幸福指数杠杠的'],
            ['title' => 'new3'],
            ['title' => 'new4'],
            ['title' => 'new5'],
            ['title' => 'new7'],
            ['title' => 'new8'],
        ];

        $dataProvider = new ArrayDataProvider([
            'allModels' => $news,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        return $dataProvider;
    }


    public function actionList()
    {
        return [
            ['title' => '党的十九大正在召开'],
            ['title' => '人民幸福指数杠杠的'],
        ];
    }
}