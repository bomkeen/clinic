<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PdPerson */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="pd-person-form">
   
    <div class="row">
        <div class="col-md-12">
           
            <div class="panel panel-info">
                <div class="panel panel-body">
                    
    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-md-4">
    
                        
                        
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            </div>
                        <div class="col-md-4">
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($model, 'age')->textInput() ?>
                        </div>
</div>
                    <div class="row">
                        <div class="col-md-3">
        <?= $form->field($model, 'hn')->textInput(['value'=>$newhn]) ?>
                        </div>
                        <div class="col-md-3">
    <?= $form->field($model, 'hn_y')->textInput(['maxlength' => true,'value' => $hn_y]) ?>
                        </div>
                        <div class="col-md-3">
    <?= $form->field($model, 'regdate')->textInput(['value' => date("Y-m-d")]) ?>
                        </div>
                    </div>
                  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
                    
    <?php ActiveForm::end(); ?>
                </div></div></div>
    </div>
        
        
</div>
