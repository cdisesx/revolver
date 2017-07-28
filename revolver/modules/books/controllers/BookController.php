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
        $obj = BookSearch::getInstance();
        $result = $obj->checkform('books\models\form\BookForm', 'list')->getList();
        return new ResponseFormat(['data' => $result, 'enum' => $obj::getEnums()]);
    }


    public function actionDetail()
    {
        $obj = BookSearch::getInstance();
        $result = $obj->checkform('books\models\form\BookForm', 'detail')->getDetail();
        return new ResponseFormat(['data' => $result, 'enum' => $obj::getEnums()]);
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
