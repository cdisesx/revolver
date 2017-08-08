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
        'redis' => [
            'class' => 'revolver\components\tools\Redis',
            'host' => '192.168.88.164',
            'port' => '22121'
        ],
        'dbTushu' => [
            'class' => 'yii\db\Connection',
            'dsn' => sprintf(
                'mysql:host=%s;dbname=%s',
                '192.168.88.163',
                'tushu'
            ),
            'username' => 'php_user',
            'password' => 'Og7Ev0iJ4z',
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
                '192.168.88.163',
                'auth_sys'
            ),
            'username' => 'php_user',
            'password' => 'Og7Ev0iJ4z',
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
