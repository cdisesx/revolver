<?php

namespace app\components\rest;


class ErrorHandler extends \yii\base\ErrorHandler
{


    protected function renderException($exception)
    {
        $msg = 'prd' === YII_ENV ? 'SYSTEM ERROR' : $exception->getMessage();
        $err = new ResponseFormat(
            [
                'code' => 500,
                'message' => $msg,
                'data' => null,
            ]
        );

        $res = \Yii::$app->response;
        $res->data = $err;
        $res->statusCode = 500;
        $res->send();
    }



}
