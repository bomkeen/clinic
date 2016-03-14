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
                    <?= $form->field($model, 'hn')->textInput(['maxlength' => true, 'value' => $hn]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'hn_y')->textInput(['maxlength' => true, 'value' => (date("Y") + 543)]) ?> 
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'tel')->textInput(['maxlength' => true, 'value' => $tel]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'value' => $name]) ?>
                </div>

                <div class="col-md-3">

                    <?= $form->field($model, 'today')->textInput(['value' => date("Y-m-d")]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'time')->textInput(['value' => date("H:i:s")]) ?>
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
                <?= Html::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
