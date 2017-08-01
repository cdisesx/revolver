<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/3/23
 * Time: 15:40
 */

/**
 * 数据测试使用
 */
function p($arr=null, $is_die=false)
{
    echo '<pre>';print_r($arr);echo '</pre>';
    if($is_die){
        exit;
    }
}


/**
 * 数据测试使用
 */
function pe($arr=null, $is_die=true)
{
    echo '<pre>';print_r($arr);echo '</pre>';
    if($is_die){
        exit;
    }
}

    /**
     * 数据测试使用
     */
function vp($arr=null, $is_die=false)
{
    echo '<pre>';var_dump($arr);echo '</pre>';
    if($is_die){
        exit;
    }
}

//获取数组中数据
function getArrayVelue($array, $key_name, $default=null, $type=''){
    $a = $default;
    if(is_array($array)){
        if (isset($array[$key_name])){
            $a = $array[$key_name];
        }
    }
    elseif(is_object($array)){
        if (isset($array->$key_name)){
            $a = $array->$key_name;
        }
    }

    if($a == $default){
        return $a;
    }
    if($type === 'int'){
        return intval($a);
    }
    if($type === 'str'){
        return addslashes($a);
    }

    return $a;
}


function getArrayValueMust($array, $key_name, $default='bukenengfashengdeshi', $type=''){
    $a = $default;
    if(is_array($array)){
        if (isset($array[$key_name])){
            $a = $array[$key_name];
        }
    }
    elseif(is_object($array)){
        if (isset($array->$key_name)){
            $a = $array->$key_name;
        }
    }

    if($a === 'bukenengfashengdeshi'){
        json_output(['code'=>1, 'msg'=>'缺少'.$key_name.'参数！']);
    }

    if($a == $default){
        return $a;
    }
    if($type === 'int'){
        return intval($a);
    }
    if($type === 'str'){
        return addslashes($a);
    }

    return $a;
}

// 返回json字符串
function json_output($data, $is_die = true){
    header('Content-type: text/json');
    if($data === false){
        $data = 0;
    }
    echo json_encode($data);
    if($is_die)exit;
}

function api_format($errorCode, $errorMsg, $data=[]){
    $success = true;
    if($errorCode != 0){
        $success = false;
    }
    return [
        'success'=>$success,
        'errorMsg'=>$errorMsg,
        'errorCode'=>$errorCode,
        'data'=>$data,
    ];
}

function getpost(){
    $data = file_get_contents("php://input");
    $r = json_decode($data, 1);
    $r = getArrayVelue($r,'p');
    return $r;
}
function getToken(){
    $data = file_get_contents("php://input");
    $r = json_decode($data, 1);
    return getArrayVelue($r, 't', false);
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec)*1000;
}

// 获取登入的管理员人信息
function getAdminInfo(){
    return Yaf_Registry::get(SSN_INFO);
}

// 获取数据库默认传参
function getModelDefault($getCreateOnly = false,$getModifierOnly = false){
    $user = getAdminInfo();
    $defaultData = [
        'version'=>0,
        'modifier'=>getArrayVelue($user, 'id'),
        'modify_time'=>date('Y-m-d H:i:s'),
        'creater'=>getArrayVelue($user, 'id'),
        'create_time'=>date('Y-m-d H:i:s')
    ];
    if($getCreateOnly){
        $defaultData = [
            'version'=>0,
            'creater'=>getArrayVelue($user, 'id'),
            'create_time'=>date('Y-m-d H:i:s')
        ];
    }
    if($getModifierOnly){
        $defaultData += [
            'version'=>0,
            'modifier'=>getArrayVelue($user, 'id'),
            'modify_time'=>date('Y-m-d H:i:s'),
        ];
    }
    return $defaultData;
}