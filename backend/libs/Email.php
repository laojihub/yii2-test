<?php

namespace common\libs;

use Yii;
use yii\base\Exception;

/**
 * 发送邮件
 * @package common\libs
 */
class Email
{
    public static function send($email, $view, $title, $data)
    {
        try {
            if (empty($email)) return false;
            //if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
            if (empty($view)) return false;

            $mailer = Yii::$app->mailer->compose($view, [
                'data' => $data
            ]);
            $mailer->setTo($email);
            $mailer->setSubject($title);

            return $mailer->send();
        } catch (Exception $e) {
            return false;
        }
    }
}