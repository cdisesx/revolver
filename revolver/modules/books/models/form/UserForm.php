<?php

namespace books\models\form;

use app\components\db\Form;

/**
 * User form
 */
class UserForm extends Form
{
    /**
     * @var integer id
     */
    public $id;

    /**
     * @var string name
     */
    public $name;

    /**
     * @var string mobile
     */
    public $mobile;

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'create' => ['name', 'mobile'],
            'search' => ['name', 'mobile'],
            'update' => ['id'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['name', 'string', 'max' => 100],
            ['name', 'required', 'on'=>['create']],

            ['mobile', 'mobile'],
            ['mobile', 'required', 'on'=>['create']],

            ['id', 'integer'],
            ['id', 'integer', 'on'=>['update']],

        ];
    }


}
