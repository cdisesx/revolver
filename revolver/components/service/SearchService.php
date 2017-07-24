<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;


use books\models\db\BookModel;
use books\models\form\UserForm;
use Yii;

class SearchService extends BaseService
{

    public function getList()
    {

        $form = new UserForm();
        $form->validateScenario(Yii::$app->params, UserForm::SCENARIO_CREATE);

        $books = BookModel::find()->limit(100)->with('user')->all();
//        $books = BookModel::find()->limit(100)->all();


        return $books;
//        $users = [];
//        foreach($books as $book){
//            $users[$book->getAttribute('id')] = $book->user;
//        }
//
//        return $users;
    }


    public function getDetail()
    {

        $id = \Yii::$app->request->post('id', 11);
        $books = BookModel::findOne($id);

//        $user = $books ? $books->user : [];

        return $books;
    }
}