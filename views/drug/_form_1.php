<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Drug */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
<div class="drug-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-1">
    <?= $form->field($model, 'id')->Input('hidden') ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'drug_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
    <?= $form->field($model, 'drug_supplier')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
    <?= $form->field($model, 'date_recive')->textInput() ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'total_recive')->textInput() ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'total_now')->textInput() ?>
        </div>
        </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
        <div class="col-md-3">
    <?= $form->field($model, 'low_limit')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-block btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>