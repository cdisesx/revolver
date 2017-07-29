<?php

/**
 * 主体配置
 */
$config = [
    'id' => MY_APP_ID,
    'basePath' => MY_APP_BASE_PATH,
    'vendorPath' => MY_LIBRARY . '/vendor',
    'runtimePath' => MY_APP_BASE_PATH . '/runtime',
    'language' => 'zh-CN',
    'charset' => 'UTF-8',
];

/**
 * 默认主体组件配置
 */
$config_components = [
    'request' => [
        'cookieValidationKey' => MY_APP_ID.'_request'
    ],
    'schemaCache' => [
        'class' => 'yii\caching\FileCache',
        'cachePath' => '@runtime/schema-cache',
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false
    ]

];


/**
 * 根据配置导入Debug
 */
if(!YII_DEBUG) {
    $config_components['errorHandler'] = [
        'class' => 'app\components\rest\ErrorHandler'
    ];
}

/**
 * 合并配置
 */
$config_part = require(MY_LIBRARY . '/config/' . MY_APP_ID . '/' . YII_ENV . '.php');
$config = array_merge($config, $config_part);
$config['components'] = array_merge($config_components, $config_part['components']);

/**
 * 本地环境导入gii
 */
if(MY_OPEN_EX) {

    // gii
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];

    // debuger
    $config['bootstrap'][] = 'debugger';
    $config['modules']['debugger'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

}


return $config;
