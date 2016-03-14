<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "drug_use".
 *
 * @property integer $id
 * @property integer $drug_id
 * @property string $drug_name
 * @property integer $total
 * @property string $text
 * @property string $updated_at
 * @property string $created_at
 */
class DrugUse extends \yii\db\ActiveRecord
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
        return 'drug_use';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ///[['text'], 'required'],
            [['drug_id', 'total','text'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['drug_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_id' => '',
            'drug_name' => 'รายชื่อยา',
            'total' => 'จำนวนเบิก',
            'text' => 'บันทึกราคา',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
