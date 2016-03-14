<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DrugUse */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        
<div class="drug-use-form">
    <div class="row">
        <div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>
        
   <?= $form->field($model, 'drug_id')->input('hidden')?>

    <?= $form->field($model, 'drug_name')->textInput(['maxlength' => true]) ?>
    </div></div>
    <div class="row">
        <div class="col-md-2">
    <?= $form->field($model, 'total')->textInput(['value'=>1]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
        </div></div>
    <div class="col-md-6">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning btn-block' : 'btn btn-primary']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
    </div>
</div>