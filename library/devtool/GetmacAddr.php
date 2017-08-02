<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/31
 * Time: 9:04
 */

namespace library\devtool\tools;


class GetmacAddr
{

    /**
     * @var array $rules mac对应环境配置
     */
    private $rules = [
        '54-AB-3A-C7-93-55'=>'xiaofuthinkpad'
    ];
    public function getThisPcEnv()
    {
        return isset($this->rules[$this->macAddr])? $this->rules[$this->macAddr] : null;
    }



    /**
     * @var array $result 返回带有MAC地址的字串数组
     * @var String $macAddr 当前匹配的MAC地址
     */
    private $result = [];
    private $macAddr = '';

    /**
     * 构造
     * GetmacAddr constructor.
     * @param $osType
     */
    function __construct(){
        $this->setResult();
        $this->setMacAddr();
    }


    /**
     * 默认获取macAddr
     * @param null $macAddr
     */
    public function setMacAddr($macAddr = null)
    {
        if(null === $macAddr){
            $temp_array =[];
            foreach($this->result as $value){
                $rex = '/'.
                    '[0-9a-f][0-9a-f][:-]'.
                    '[0-9a-f][0-9a-f][:-]'.
                    '[0-9a-f][0-9a-f][:-]'.
                    '[0-9a-f][0-9a-f][:-]'.
                    '[0-9a-f][0-9a-f][:-]'.
                    '[0-9a-f][0-9a-f]/i';
                if(preg_match($rex, $value, $temp_array)){
                    // 获取第一个mac地址
                    $this->macAddr = $temp_array[0];
                    break;
                }
            }
        }else{
            $this->macAddr = $macAddr;
        }
    }


    /**
     * 获取当前匹配的macAddr
     * @return mixed
     */
    public function getMacAddr(){
        return $this->macAddr;
    }

    /**
     * 获取默认Result
     * @param null $result
     */
    public function setResult($result = null)
    {
        if(null === $result){
            if(!$this->for_windows_os()){
                $this->for_linux_os();
            }
        }else{
            $this->result = $result;
        }
    }

    /**
     * 获取查询结果
     * @return array
     */
    public function getResult(){
        return $this->result;
    }


    /*linux系统中获取方法*/
    private function for_linux_os(){
        @exec("ifconfig -a", $this->result);
        return $this->result;
    }


    /*win系统中的获取方法*/
    private function for_windows_os(){
        @exec("ipconfig /all", $this->result);
        if ( $this->result ) {
            return $this->result;
        } else {
            $ipconfig = $_SERVER["WINDIR"]."\system32\ipconfig.exe";
            if(is_file($ipconfig)) {
                @exec($ipconfig." /all", $this->result);
            } else {
                @exec($_SERVER["WINDIR"]."\system\ipconfig.exe /all", $this->result);
                return $this->result;
            }
        }
    }



}