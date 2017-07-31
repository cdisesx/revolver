<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/10
 * Time: 16:26
 */

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'wmkmac');

defined('MY_LIBRARY') or define('MY_LIBRARY', __DIR__ . '/../../library');
defined('MY_APP_BASE_PATH') or define('MY_APP_BASE_PATH', __DIR__ . '/..');
defined('MY_OPEN_EX') or define('MY_OPEN_EX', true);

/**
 * 设置该MY_APP_ID后,以下位置都应以该ID命名
 * 1.应用主体所在项目命名空间
 * 2.项目根目录名称
 * 3.对应配置文件目录
 * 4.枚举文件名
 **/
defined('MY_APP_ID') or define('MY_APP_ID', 'revolver');

/**
 * 个人调试用类
 **/
require(MY_APP_BASE_PATH . '/components/HelpFunc.php');

/**
 * composer、Yii2的自动加载类
 **/
require(MY_LIBRARY . '/vendor/autoload.php');
require(MY_LIBRARY . '/vendor/yiisoft/yii2/Yii.php');

/**
 * 生成应用主体
 */
$config = require(MY_LIBRARY . '/config/apiCommon.php');
(new \yii\web\Application($config))->run();