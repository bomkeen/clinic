<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\DrugUnit;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
date_default_timezone_set('Asia/Bangkok');
//locale_set_default('th-TH');

/* @var $this yii\web\View */
/* @var $model app\models\Drug */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">

<div class="drug-form">
   

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
    <?= $form->field($model, 'drug_name')->textInput(['maxlength' => true]) ?>
        </div></div>
    <div class="row">
        <div class="col-md-4">
    <?= $form->field($model, 'drug_supplier')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-0">
    <?= $form->field($model, 'date_recive')->widget(\yii\jui\DatePicker::classname(),[      
       
        'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        </div>
        <div class="col-md-4 col-md-offset-0">
    <?= $form->field($model, 'expiration_date')->widget(\yii\jui\DatePicker::classname(),[      
       
        'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
    <?= $form->field($model, 'total_recive')->input('number')?>
        </div>
       
        <div class="col-md-3">
    <?= $form->field($model, 'unit_id')->dropDownList(
                    ArrayHelper::map(DrugUnit::find()->all(), 'id', 'drug_unit_name'), ['prompt' => 'เลือก Unit']
            )
            ?>
        </div>
        <div class="col-md-2">
    <?= $form->field($model, 'price')->input('number')?>
        </div>
        <div class="col-md-2">
    <?= $form->field($model, 'low_limit')->input('number',['value'=>1])?>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-3">
            
         <?= $form->field($model, 'status')->radioList(array('Y'=>'ยังใช้งาน','N'=>'ปิดการใช้งาน')); ?>  
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div></div>
</div>