<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pd_person".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $tel
 * @property integer $age
 * @property string $regdate
 * @property integer $hn
 * @property string $hn_y
 */
class PdPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pd_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['age', 'hn'], 'integer'],
            [['regdate'], 'safe'],
            [['code', 'name', 'tel', 'hn_y'], 'string', 'max' => 255]
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
            'age' => 'อายุ',
            'regdate' => 'วันที่บันทึกข้อมูล',
            'hn' => 'Hn',
            'hn_y' => 'Hn Y',
        ];
    }
}
