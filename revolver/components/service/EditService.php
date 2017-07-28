<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;

class EditService extends BaseService
{

    public function add(){
//        throw new ExitException('There is an Error that named Null');
        return false;
    }


    public function edit(){
        return true;
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