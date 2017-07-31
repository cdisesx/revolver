<?php

namespace books\models\db;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $user_phone
 * @property integer $book_id
 * @property string $book_name
 * @property string $borrow_time
 * @property string $renew_time
 * @property string $return_time
 * @property string $pay_price
 * @property string $create_time
 */
class TicketModel extends \app\components\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbTushu');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id'], 'integer'],
            [['borrow_time', 'renew_time', 'return_time', 'create_time'], 'safe'],
            [['pay_price'], 'number'],
            [['user_name', 'user_phone', 'book_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '罚单ID',
            'user_name' => '被罚人名称',
            'user_phone' => '被罚人电话',
            'book_id' => '书籍ID',
            'book_name' => '对应书籍',
            'borrow_time' => '图书借阅时间',
            'renew_time' => '图书续借时间',
            'return_time' => '图书归还时间',
            'pay_price' => '实际已交罚金金额',
            'create_time' => '创建时间',
        ];
    }
}
