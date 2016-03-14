<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use app\models\DrugUnit;

/**
 * This is the model class for table "drug".
 *
 * @property integer $id
 * @property string $drug_name
 * @property string $drug_supplier
 * @property string $date_recive
 * @property integer $total_recive
 * @property integer $total_now
 * @property string $updated_at
 * @property string $created_at
 */
class Drug extends \yii\db\ActiveRecord
{
   public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'updated_at',
            'updatedAtAttribute' => 'created_at',
            'value' => new Expression('NOW()'),
        ],
    ];
}
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['low_limit','expiration_date','status'], 'required'],
            [['id', 'total_recive', 'total_now','unit_id','low_limit'], 'integer'],
            [['date_recive', 'updated_at', 'created_at','price','expiration_date','status'], 'safe'],
            [['drug_name', 'drug_supplier'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_name' => 'รายชื่อยา',
            'drug_supplier' => 'ตัวแทนจำหน่าย',
            'date_recive' => 'วันที่รับสินค้า',
            'total_recive' => 'จำนวนที่รับเข้า',
            'unit_id'=>'หน่วย',
            'total_now' => 'จำนวนคงเหลือ',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'expiration_date'=>'วันหมดอายุ',
            'low_limit'=>'คงเหลือขั้นต่ำ',
            'status'=>'สถานะ',
            'price'=>'ราคา',
            'unitname'=>'หน่วย'
        ];
    }
    public function getUnit() {
        return @$this->hasOne(DrugUnit::className(), ['id' => 'unit_id']);
    }

    public function getUnitName() {
        return @$this->unit->drug_unit_name;
    }
}
