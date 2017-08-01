<?php

namespace books\models\db;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $user_id
 * @property integer $do_type
 * @property string $do_time
 */
class HistoryModel extends \revolver\components\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
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
            [['book_id', 'user_id', 'do_type'], 'integer'],
            [['do_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => '书籍id',
            'user_id' => '借阅者id',
            'do_type' => '执行类型：1-借阅 2-还书 3-报失 4-续借',
            'do_time' => '执行时间',
        ];
    }

    protected $enums = [
        'type'=>[
            1=>'借阅',
            2=>'归还',
            3=>'报失',
            4=>'续借',
            5=>'新增',
            6=>'更新'
        ]
    ];
}
