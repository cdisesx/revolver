<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;

use app\components\db\ActiveRecord;
use yii\db\Transaction;

class EditService extends BaseService
{


    public function create(){
        $M = $this->getDefauleModel();
        $M->setAttributes($this->form->toArray());
        $M->save();
        $id = $M->getPrimaryKey();

        if(intval($id) > 0){
            return $id;
        }else{
            throw new ServiceException('添加失败', 100005);
        }
    }


    public function update(){

        $M = $this->getDefauleModel();
        $AR = $M::findOne($this->form->id);
        $ok = false;
        if($AR){
            $this->setUpdateAttributes($AR, $this->form->toArray());
            $ok = $AR->save();
        }

        if($ok){
            return true;
        }else{
            throw new ServiceException('更新失败', 100006);
        }

    }

    public function setUpdateAttributes(ActiveRecord &$Query, $data)
    {
        if(count($data)){
            foreach ($data as $name=>$value){
                if(null !== $value){
                    $Query->setAttribute($name, $value);
                }
            }
        }
    }

    /**
     * 事物封装
     * @var Transaction
     */
    public static $Transaction = null;
    public static function beginTransaction()
    {
        $M = static::getDefauleModel();
        static::$Transaction = $T = new Transaction(['db'=>$M::getDb()]);
        $T->begin();
    }

    public static function commitTransaction()
    {
        $T = static::$Transaction;
        $T->commit();
    }
    public static function rollBackTransaction()
    {
        $T = static::$Transaction;
        $T->rollBack();
    }

}