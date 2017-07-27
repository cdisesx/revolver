<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;


use books\models\db\BookModel;
use yii\db\Query;

class SearchService extends BaseService
{

    public function getList()
    {
        $M = \Yii::createObject($this->getDefaultModel());

        $Query = new Query();
        $this->setSearch($Query);

        $list = $this->pageQuery(
            $Query,
            $M::getDb(),
            $this->form->page,
            $this->form->size
        );

        return $list;
    }

    public function setSearch(&$Query)
    {
        // from 处理
        if($this->getSearchOp('from')){
            $Query->from($this->getSearchOp('from'));
        }
        // select 处理
        if($this->getSearchOp('select')){
            $Query->select($this->getSearchOp('select'));
        }
        // join处理
        if($this->getSearchOp('join')){
            foreach ($this->getSearchOp('join') as $joinArr) {
                list($a, $b, $c) = $joinArr;
                $Query->join($a, $b, $c);
            }
        }
        // andWhere处理
        if($this->getSearchOp('andWhere')){
            foreach ($this->getSearchOp('andWhere') as $andWhere) {
                $Query->andWhere($andWhere);
            }
        }
        // andFilerwhere处理
        if($this->getSearchOp('andFilterWhere')){
            foreach ($this->getSearchOp('join') as $andFilerWhere) {
                $Query->andFilterWhere($andFilerWhere);
            }
        }
        // orderBy处理
        if($this->getSearchOp('orderBy')){
            $Query->orderBy($this->getSearchOp('orderBy'));
        }
        // groupBy处理
        if($this->getSearchOp('groupBy')){
            $Query->groupBy($this->getSearchOp('groupBy'));
        }

    }


    public function getDetail()
    {
        $id = \Yii::$app->request->post('id', 11);
        $books = BookModel::findOne($id);
        return $books;
    }





    protected $searchOps = null;
    public function setSearchOps($searchOp)
    {
        $this->searchOps = array_merge([
            'select' => '*',
            'join' => null,
            'andWhere' => null,
            'andFilterWhere' => null,
            'orderBy' => null,
            'groupBy' => null
        ], $searchOp);
    }
    public function getSearchOps()
    {
        return $this->searchOps;
    }
    public function setSearchOp($opName, $value)
    {
        $this->searchOps[$opName] = $value;
    }
    public function getSearchOp($opName)
    {
        return isset($this->searchOps[$opName]) ? $this->searchOps[$opName] : null;
    }

}