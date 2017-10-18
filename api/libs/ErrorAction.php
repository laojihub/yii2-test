<?php

namespace api\libs;

use Yii;
use yii\web\ErrorAction as BaseErrorAction;

/**
 * 异常返回
 * @package api\libs
 */
class ErrorAction extends BaseErrorAction
{

    public function run()
    {
        Yii::$app->getResponse()->setStatusCodeByException($this->exception);

        return $this->renderApiResponse();
    }

    /**
     * api项目异常返回
     * @return array
     */
    public function renderApiResponse()
    {
        return [
            'message' => $this->getExceptionMessage(),
            'error' => $this->getExceptionCode(),
            'name' => $this->getExceptionName()
        ];
    }
}