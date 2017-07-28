<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;

use books\models\db\BookModel;
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
        $MQ = $M::findOne($this->form->id);
        $BookM = BookModel::findOne($this->form->id);
        $ok = false;
        if($MQ){
            $MQ->setAttributes($this->form->toArray());
            $ok = $MQ->update();
        }

        if($ok){
            return true;
        }else{
            throw new ServiceException('更新失败', 100006);
        }



    }
    
    
    protected $saveOp = null;
    protected $getSaveRuleByOp = false;
    public function setSaveOp($op)
    {
        $this->getSaveRuleByOp = true;
        $this->saveOp = $op;
    }
    public function getSaveOp()
    {
        return $this->saveOp;
    }

}