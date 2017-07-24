<?php

namespace app\components\rest;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * 接口控制器基类
 */
class Controller extends \yii\base\Controller
{

    /**
     * 创建行为
     */
    public function behaviors()
    {
        return [
            // 头部信息过滤，并设置传参params
            'header' => [
                'class' => HeaderFilter::className(),
                'except' => ['error'],
            ],

            // 访问权限控制
            'access' => [
                'class' => AccessFilter::className(),
                'except' => ['error'],
            ],

            // put、post、get过滤器
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],

            // 字段过滤

        ];

    }




}