<?php

// 设置别名
Yii::setAlias('@books', MY_APP_BASE_PATH . '/modules/books');

// 环境配置
return [
    'modules' => [
        'books' => [
            'class' => 'books\Module',
        ]
    ],
    'params' => [],
    'bootstrap' => ['log'],
    'components' => [
//        'redis' => [
//            'class' => 'app\components\tools\Redis',
//            'host' => '127.0.0.1',
//            'port' => '6379'
//        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => '6379',
            'password' => null,
            'database' => 0,
        ],
        'dbTushu' => [
            'class' => 'yii\db\Connection',
            'dsn' => sprintf(
                'mysql:host=%s;dbname=%s',
                '127.0.0.1',
                'tushu'
            ),
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            // 从库的通用配置
//            'slaveConfig' => [
//                'username' => 'slave',
//                'password' => '',
//                'attributes' => [
//                    // 连接超时
//                    PDO::ATTR_TIMEOUT => 60,
//                ],
//            ],
//
//            // 从库的配置列表
//            'slaves' => [
//                ['dsn' => 'dsn for slave server 1'],
//                ['dsn' => 'dsn for slave server 2'],
//                ['dsn' => 'dsn for slave server 3'],
//                ['dsn' => 'dsn for slave server 4'],
//            ],

        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => sprintf(
                'mysql:host=%s;dbname=%s',
                '127.0.0.1',
                'auth_sys'
            ),
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',

        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];
