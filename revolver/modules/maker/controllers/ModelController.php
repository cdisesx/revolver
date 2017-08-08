<?php

namespace maker\controllers;


use maker\services\file\FileCreater;
use yii\base\Controller;

class ModelController extends Controller
{
    public $checkForm;

    public function init()
    {
        $this->checkForm = 'maker\models\form\ModelForm';
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public function verbs()
    {
        return [
            'index'=>['get','post'],
            'createOne' => ['post'],
            'createAll' => ['post'],
        ];
    }

    public function actionIndex()
    {
        FileCreater::getInstance()->checkform($this->checkForm, 'index');
        $result = S::getInstance()->checkform($this->checkForm, 'list')->getList();
        return new ResponseFormat(['data' => $result, 'enum' => S::getEnums()]);
    }


    public function actionCreateOne()
    {
        $result = E::getInstance()->checkform($this->checkForm, 'create')->create();
        return new ResponseFormat(['data'=>$result]);
    }

    public function actionCreateAll()
    {
        $result = E::getInstance()->checkform($this->checkForm, 'create')->create();
        return new ResponseFormat(['data'=>$result]);
    }




}