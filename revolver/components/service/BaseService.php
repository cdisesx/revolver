<?php
/**
 * Created by PhpStorm.
 * User: Justin
 * Date: 2017/7/18
 * Time: 16:08
 */
namespace app\components\service;

use yii\base\Component;
use yii\db\Connection;
use yii\db\Query;

class BaseService extends Component
{

    /**
     * 返回 service 单例
     *
     * @return static
     */
    public static function getInstance()
    {
        static $instance;

        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * 基础模型；
     * @var string
     */
    protected $defaultModel = '';

    public function setDefaultModel($defaultModel)
    {
        $this->defaultModel = $defaultModel;
    }

    public function getDefaultModel()
    {
        return $this->defaultModel;
    }


    /**
     * form验证
     * @param $className
     * @param $scenario
     * @throws \yii\base\InvalidConfigException
     */
    public $form = NULL;
    public function checkform($className, $scenario)
    {
        if(!$className){
            throw new \InvalidArgumentException('FormClass name can not be empty.');
        }

        if(!$scenario){
            throw new \InvalidArgumentException('Check form scenario can not be empty.');
        }

        $params['class'] = $className;
        $form = \Yii::createObject(['class'=>$className]);
        $form->validateScenario(\Yii::$app->params, $scenario);

        $this->form = $form;

        return $this;
    }



    /**
     * 返回分页结果
     *
     * @param Query $query
     * @param Connection|null $db
     * @param int $pageNo
     * @param int $pageSize
     * @param callable|null $handle
     * @return array
     */
    protected function pageQuery(
        Query $query,
        Connection $db = null,
        $pageNo = 1,
        $pageSize = 20,
        callable $handle = null
    ) {
        $pageNo = intval($pageNo);
        $pageNo = $pageNo > 0 ? $pageNo : 1;
        $pageSize = intval($pageSize);
        $pageSize = $pageSize > 0 ? $pageSize : 10;

        $countQuery = clone $query;
        $totalResults = intval($countQuery->count('*', $db));

        $query->offset(($pageNo - 1) * $pageSize);
        $query->limit($pageSize);
        $list = $query->all($db);

        if ($list && $handle) {
            if (($result = call_user_func_array($handle, [&$list])) !== null) {
                $list = $result;
            }
        }

        return [
            'has_next' => $totalResults > ($pageNo * $pageSize),
            'total' => $totalResults,
            'page' => $pageNo,
            'size' => $pageSize,
            'list' => $list,
        ];
    }

    /**
     * 返回分页结果
     *
     * @param array $list
     * @param $totalResults
     * @param int $pageNo
     * @param int $pageSize
     * @return array
     */
    protected function pageResult(array $list = [], $totalResults = 0, $pageNo = 1, $pageSize = 100)
    {
        return [
            'total_results' => $totalResults,
            'has_next' => $totalResults > ($pageNo * $pageSize),
            'page_no' => $pageNo,
            'page_size' => $pageSize,
            'list' => $list
        ];
    }


}