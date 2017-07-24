<?php

namespace app\components\rest;

use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

/**
 * Access Filter
 *
 * token: TOKEN
 */
class AccessFilter extends ActionFilter
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
//        $this->checkToken(Yii::$app->request->headers);
        return parent::beforeAction($action);
    }

    /**
     * Token验证
     * @param $headers
     * @throws ForbiddenHttpException
     */
    public function checkToken($headers)
    {
        if (!isset($headers->token) || Yii::$app->params['token'] != $headers->get('token')) {
            throw new ForbiddenHttpException();
        }
    }


}
