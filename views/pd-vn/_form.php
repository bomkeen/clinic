<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
date_default_timezone_set('Asia/Bangkok');
/* @var $this yii\web\View */
/* @var $model app\models\PdVn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pd-vn-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="panel panel-info">
            <div class="panel panel-body">
        <div class="col-md-12 col-md-offset-0">


            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'hn_y')->textInput(['maxlength' => true]) ?> 
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-3">

                    <?= $form->field($model, 'today')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'time')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'pttype')->dropDownList(ArrayHelper::map(\app\models\PdPttype::find()->all(), 'id', 'name'), ['prompt' => 'เลือกสิทธิ']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
