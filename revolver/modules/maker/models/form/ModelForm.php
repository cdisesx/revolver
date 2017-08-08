<?php

namespace maker\models\form;

/**
 * ModelForm
 */
class ModelForm extends \revolver\components\db\Form
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
            'createOne' => ['db', 'table'],
            'createAll' => ['db'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['db' ,'table'], 'string'],

            ['db', 'required'],
            ['table', 'required', 'on'=>['createOne']],

        ];
    }


}
