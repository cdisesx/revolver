<?php

namespace books\models\form;

use app\components\db\Form;

/**
 * User form
 */
class UserForm extends Form
{
    /**
     * @var string name
     */
    public $name;

    /**
     * @var string mobile
     */
    public $mobile;

    /**
     * create user
     */
    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['name', 'mobile'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 100],
            ['mobile', 'required'],
            ['mobile', 'idcard'],
        ];
    }
}
