<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/10
 * Time: 16:26
 */

/**
 * MY_LIBRARY Yii类库导入
 */
defined('MY_LIBRARY') or define('MY_LIBRARY', __DIR__ . '/../../library');

/**
 * 开发环境，引入个人调试用类
 * 并自动获取根据当前Mac匹配环境
 **/
if(true){
    require(MY_LIBRARY . '/devtool/HelpFunc.php');
    require (MY_LIBRARY . '/devtool/GetmacAddr.php');
    $Mac = new \library\devtool\tools\GetmacAddr('win');
    define('YII_ENV', $Mac->getThisPcEnv());
}

/**
 * 基本环境配置
 * YII_DEBUG yii自带 debug
 * YII_ENV 设置默认当前环境
 * MY_APP_BASE_PATH 当期应用地址
 * MY_OPEN_EX 开启gii debugger
 */
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'local');
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
 * composer、Yii2的自动加载类
 **/
require(MY_LIBRARY . '/vendor/autoload.php');
require(MY_LIBRARY . '/vendor/yiisoft/yii2/Yii.php');

/**
 * 生成应用主体
 */
$config = require(MY_LIBRARY . '/config/apiCommon.php');
(new \yii\web\Application($config))->run();