<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DrugUseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการเบิกยา';
$this->params['breadcrumbs'][] = $this->title;
if (isset($dataProvider))
?>

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
<div class="drug-use-index">

   <div class="row">
       
    <div class="col-md-10">
    <p class="page-header"> รายการเบิกยา ข้อมูลระหว่างวันที่ <?php echo $date1 ;?> ถึง <?php echo $date2 ;?></p>
    </div>
       <div class="col-md-2">
   <p>
        <?= Html::a('ทำรายการเบิกยา', ['drug/index'], ['class' => 'btn btn-success fa fa-share']) ?>
    </p>
       </div>
   </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php
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
            [
                'label'=>'รหัสการเบิก',
                'value'=>'id',
            ],
            [
                'label'=>'วันที่ทำการเบิก',
                'value'=>'created_at',
            ],
            [
                'label'=>'รายชื่อยา',
                'value'=>'drug_name',
            ],
            [
                'label'=>'จำนวนที่เบิก',
                'value'=>'total',
            ],
            [
                'label'=>'ราคา',
                'value'=>'text',
            ],
            [
  'label' =>'Action', 
  'value' => function ($model) 
  { 
  return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model['id']], ['data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post',],]); 
  },
  'format'=>'raw', 
],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
