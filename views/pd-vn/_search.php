<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['visitlist'],
        'method' => 'get',
        'options' => ['data-pjax' => true ]
    ]); ?>
    <div class="input-group">
      <?= Html::activeTextInput($model, 'q',['class'=>'form-control','placeholder'=>'ค้นหาข้อมูล... จาก ซื้อ HN หรือเบอร์โทร']) ?>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        
      </span>
    </div>
    <?php ActiveForm::end(); ?>

</div>