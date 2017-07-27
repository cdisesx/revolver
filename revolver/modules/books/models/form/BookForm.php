<?php

namespace books\models\form;

use app\components\db\Form;

/**
 * Book form
 */
class BookForm extends Form
{
    public $id;
    public $name;
    public $key_word;
    public $introduction;
    public $pic;
    public $status;
    public $user_id;
    public $borrow_time;
    public $lose_time;
    public $return_time;
    public $renew_time;
    public $buy_time;
    public $before_lose_fine;
    public $page;
    public $size;
    public $phone;

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'create' => [
                'name',
                'key_word',
                'introduction',
                'pic',
                'buy_time'
            ],
            'search' => ['phone', 'key_word', 'status', 'page', 'size'],
            'update' => [
                'id',
                'name',
                'key_word',
                'introduction',
                'pic',
                'buy_time'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['introduction'], 'string'],
            [['status', 'user_id', 'page', 'size'], 'integer'],
            [['borrow_time', 'lose_time', 'return_time', 'renew_time', 'buy_time'], 'safe'],
            [['before_lose_fine'], 'number'],
            [['name'], 'string', 'max' => 50],
//            [['key_word', 'pic'], 'string', 'max' => 100],
            [['phone'], 'mobile'],

            [['key_word'], 'required', 'on'=>['search']],

            [[
                'name',
                'key_word',
                'introduction',
                'pic',
                'buy_time'
            ], 'required', 'on'=>['create']]



        ];
    }


}
