<?php

namespace books\controllers;

use app\components\rest\ResponseFormat;
use books\services\book\BookEdit;
use books\services\book\BookSearch;
use Yii;
use app\components\rest\Controller;


/**
 * Book
 */
class BookController extends Controller
{


    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [
            'list' => ['post'],
            'detail' => ['post'],
            'create' => ['post'],
            'update' => ['post']
        ];
    }

    public function actionList()
    {
        $result = BookSearch::getInstance()->getList();
        return new ResponseFormat(['data' => $result]);
    }


    public function actionDetail()
    {
        $result = BookSearch::getInstance()->getDetail();
        return new ResponseFormat(['data' => $result]);
    }


    public function actionCreate()
    {
        $result = BookEdit::getInstance()->add();
        return new ResponseFormat(['data']);
    }

    public function actionUpdate()
    {
        $result = BookEdit::getInstance()->edit();
        return new ResponseFormat(['data']);
    }




}
