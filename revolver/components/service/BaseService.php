<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;

use yii\base\Component;

class BaseService extends Component
{

    /**
     * 返回 service 单例
     *
     * @return static
     */
    public static function getInstance()
    {
        static $instance;

        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }



}