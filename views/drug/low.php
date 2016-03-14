<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

use kartik\widgets\Alert;
use kartik\widgets\Growl;
$test="ทดสอบ";
?>
   

            
            <?php 


$this->title = 'รายการยาเหนือจำนวนน้อยใน Stock';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-index">

    <h1><div class="label label-warning"><?= Html::encode($this->title) ?></div></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
            <div class="col-md-2">
    <p>
        <?= Html::a('เพิ่มรายการใหม่', ['create'], ['class' => 'btn btn-danger fa fa-plus']) ?>
    </p>
        </div>
<div class="col-md-6 col-md-offset-0">
    
    </div>
    
    </div>
    
    <?php echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel'=>$searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'responsive' => TRUE,
        //'showPageSummary' => true,
        'hover' => true,
        
        'floatHeader' => true,
        
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i></h3>',
            'before' => '',
            'type' => \kartik\grid\GridView::TYPE_SUCCESS,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'drug_name',
            'drug_supplier',
            'date_recive:date:วันรับยา',
            'expiration_date:date:วันหมดอายุ',
            'unitname',
            'total_recive',
            
             'total_now',
            'status',
            
                               
                               [
'label'=>'แก้ไข',
    
'format' => 'raw',
'value'=>function ($data) {
return Html::a('',['drug/update','id'=>$data['id']],['class' => 'btn btn-success fa fa-edit']);


},
],
        ],
    ]); ?>

</div>
