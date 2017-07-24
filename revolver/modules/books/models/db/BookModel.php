<?php

namespace books\models\db;

use app\components\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $name
 * @property string $key_word
 * @property string $introduction
 * @property string $pic
 * @property integer $status
 * @property integer $user_id
 * @property string $borrow_time
 * @property string $lose_time
 * @property string $return_time
 * @property string $renew_time
 * @property string $buy_time
 * @property string $before_lose_fine
 */
class BookModel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
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
            [['introduction'], 'string'],
            [['status', 'user_id'], 'integer'],
            [['borrow_time', 'lose_time', 'return_time', 'renew_time', 'buy_time'], 'safe'],
            [['before_lose_fine'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['key_word', 'pic'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '书籍名称',
            'key_word' => '关键字搜索',
            'introduction' => '书籍简介',
            'pic' => '照片',
            'status' => '借阅状态：1-在架 2-已借出 3-丢失 4-续借',
            'user_id' => '借阅人id',
            'borrow_time' => '借阅时间',
            'lose_time' => '丢失时间',
            'return_time' => '归还时间',
            'renew_time' => '续借时间',
            'buy_time' => '入库时间',
            'before_lose_fine' => '丢失前罚金额度',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }

}
