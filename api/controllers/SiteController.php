<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'api\libs\ErrorAction',
            ],
        ];
    }

    /**
     * api index
     *
     * @return string
     */
    public function actionIndex()
    {
        return 'this is a api project.';
    }

    /**
     * api test
     * @return array
     */
    public function actionTest()
    {
        return [
            'a' => 1, 'b' => 2
        ];
    }

    /**
     * api post
     */
    public function actionPost()
    {
        return Yii::$app->request->post();
    }
}
