<?php

namespace api\libs;

use yii\rest\Serializer as BaseSerializer;

/**
 * api返回的数据格式化
 * @package api\libs
 */
class Serializer extends BaseSerializer
{
    /**
     * 当为null时，分页信息会被加到http的header部分，不在response数据部分输出
     * 设置为字符串时，该属性会作为返回数据的键出现在response中
     *
     * @var string collectionEnvelope
     */
    public $collectionEnvelope = 'data';

    /**
     * 当collectionEnvelope不为null时，该属性会以分页链接数组的键出现在response中
     *
     * @var string
     */
    public $linksEnvelope = 'links';

    /**
     * 当collectionEnvelope不为null时，该属性会以分页数组的键出现在response中
     *
     * @var string
     */
    public $metaEnvelope = 'pages';
}