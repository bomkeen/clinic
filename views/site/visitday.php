<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
?>
<div class="row">
<div class="col-md-4">
    <h3><div class="label label-info">รายละเอียดการเข้ารับบริการ ตามช่วงเวลา</div></h3>
</div>
</div>
<div class='well'>
    <form method="POST">
        ระหว่าง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ],
        ]);
        ?>
        ถึง:
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
            ]
        ]);
        ?>
        <button class='btn btn-danger'>ประมวลผล</button>
    </form>
</div>
<?php
if (isset($dataProvider))
//    print_r($dataProvider);
//return;
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel'=>$searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        'responsive' => TRUE,
        'showPageSummary' => true,
        'hover' => true,
        
        'floatHeader' => true,
        
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i></h3>',
            'before' => '',
            'type' => \kartik\grid\GridView::TYPE_SUCCESS,
        ],
        'columns' => [
         [
    'class'=>'kartik\grid\SerialColumn',
    'contentOptions'=>['class'=>'kartik-sheet-style'],
    'width'=>'36px',
    'header'=>'',
    'headerOptions'=>['class'=>'kartik-sheet-style']
],
         'today:date:วันเข้ารับบริการ',
            [
            'attribute' => 'time',
            'header' => 'เวลารับบริการ'
        ],
            
             [
            'attribute' => 'name',
            'header' => 'ชื่อ สกุล'
        ],
            [
            'attribute' => 'hn',
            'header' => 'HN:'
        ],
            [
            'attribute' => 'hn_y',
            'header' => 'HN Year:'
        ],
            
            [
            'attribute' => 'price',
            'header' => 'รายรับ'
        ], 
           
             
        ],
    ]);
?>




