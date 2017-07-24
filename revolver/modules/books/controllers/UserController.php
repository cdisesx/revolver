<?php

namespace books\controllers;

use app\components\web\Controller;



/**
 * User
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [
            'test' => ['get']
        ];
    }

    /**
     * Create user
     *
     * @return Response
     */
    public function actionTest()
    {
        echo hahahha;exit;
    }


}
