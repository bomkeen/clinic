<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pd_vn".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $tel
 * @property string $today
 * @property string $time
 * @property string $pttype
 * @property string $price
 * @property string $hn
 * @property string $hn_y
 */
class PdVn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pd_vn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['price'], 'required'],
            [['today', 'time'], 'safe'],
            [['code', 'name', 'tel', 'pttype', 'hn', 'hn_y'], 'string', 'max' => 255],
            [['price'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'ชื่อ สกุล',
            'tel' => 'Tel',
            'today' => 'วันที่รับบริการ',
            'time' => 'เวลา',
            'pttype' => 'สิทธิการรักษา',
            'price' => 'ค่าใช้จ่าย',
            'hn' => 'HN :',
            'hn_y' => 'Hn รายปี',
        ];
    }
}
