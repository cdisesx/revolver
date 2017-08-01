<?php

namespace books\models\db;

use Yii;

/**
 * This is the model class for table "code".
 *
 * @property integer $id
 * @property string $phone
 * @property string $code
 * @property string $send_time
 * @property integer $num
 * @property integer $type
 */
class CodeModel extends \revolver\components\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'code';
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
            [['send_time'], 'safe'],
            [['num', 'type'], 'integer'],
            [['phone'], 'string', 'max' => 20],
            [['code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => '手机号',
            'code' => '验证码',
            'send_time' => '生效时间',
            'num' => '发送次数',
            'type' => '验证码类型 0-借阅 1-归还 2-报失 3-续借',
        ];
    }

    protected $enums = [
        'type'=>[
            0=>'借阅',
            1=>'归还',
            2=>'报失',
            3=>'续借'
        ]
    ];
}
