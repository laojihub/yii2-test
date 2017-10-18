<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;
use yii\filters\Cors;

class BaseController extends Controller
{
    /**
     * 序列化
     * @var string
     */
    public $serializer = 'api\libs\Serializer';


    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            //跨域请求时的相关控制
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                ],
            ],
        ]);
    }
}