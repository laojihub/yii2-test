<?php

namespace common\libs;

use linslin\yii2\curl\Curl;

/**
 * api访问
 * @package common\libs
 */
class RemoteApi
{

    public static function get($url)
    {
        return json_decode(file_get_contents($url));
    }


    public static function post($url, $data = [])
    {

        $curl = new Curl();
        $res = $curl
            ->setOption(CURLOPT_POSTFIELDS, $data)
            ->setOption(CURLINFO_CONTENT_TYPE, 'application/x-www-form-urlencoded')
            ->setOption(CURLOPT_SSL_VERIFYPEER, false)
            ->setOption(CURLOPT_SSL_VERIFYHOST, false)
            ->post($url);

        return $res;
    }
}