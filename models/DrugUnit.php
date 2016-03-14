<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_unit".
 *
 * @property integer $id
 * @property string $drug_unit_name
 */
class DrugUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drug_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_unit_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_unit_name' => 'Drug Unit Name',
        ];
    }
}
