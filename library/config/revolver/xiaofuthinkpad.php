<?php

// 设置别名
Yii::setAlias('@maker', MY_APP_BASE_PATH . '/modules/maker');

// 环境配置
return [
    'modules' => [
        'maker' => [
            'class' => 'maker\Module',
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
