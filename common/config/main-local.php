<?php
return [
    'components' => [
        'db' => [
            //数据库基本配置
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2test',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            //读写分离 从服务器配置
            'slaveConfig' => [
                'username' => 'root',
                'password' => '',
                'attributes' => [
                    PDO::ATTR_TIMEOUT => 10,
                ],
                'charset' => 'utf8',
            ],
            'slaves' => [
                ['dsn' => 'mysql:host=127.0.0.1;dbname=yii2test'],
            ],
        ],
        'redis' => [
            //redis 缓存配置 Yii::$app->redis
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'password' => 'crs-123456',
            'database' => 0,
        ],
        'mailer' => [
            //邮件发送配置  Yii::$app->mailer
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.exmail.qq.com',
                'username' => 'xxx@qq.cn',
                'password' => 'xxx',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['xxxx@qq.com'=>'xxx']
            ]
        ],
    ],
];
