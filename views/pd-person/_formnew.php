<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PdPerson */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="pd-person-form">
    
    <div class="row">
        <div class="col-md-10">
             
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
                        <div class="col-md-1">
                            <?= $form->field($model, 'age')->textInput() ?>
                        </div>
</div>
                    <div class="row">
                        <div class="col-md-2">
        <?= $form->field($model, 'hn')->textInput() ?>
                        </div>
                        <div class="col-md-2">
    <?= $form->field($model, 'hn_y')->textInput(['maxlength' => true,'value'=>$hn_y]) ?>
                        </div>
                        <div class="col-md-2">
    <?= $form->field($model, 'regdate')->textInput() ?>
                        </div>
                    </div>
                  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึกและส่งตรวจ' : 'บันทึกและส่งตรวจ', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-danger']) ?>
   
    </div>
                            
    <?php ActiveForm::end(); ?>
                </div></div></div>
    </div>
        
        <div class="col-md-3 col-md-offset-0">
         <a class="btn btn-block btn-lg btn-success glyphicon glyphicon-refresh" href="<?= \yii\helpers\Url::to(['/pd-person/updatenew',
             'id'=>$id,
             'hn'=>$hn,
             'tel'=>$tel,
             'name'=>$name,
             'hn_y'=>$hn_y
             
             ]) ?>"> ออกเลข HN ใหม่</a>
        </div>
</div>
