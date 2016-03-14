<?php

use yii\helpers\Html;
use yii\grid\GridView;

use kartik\widgets\Alert;
use kartik\widgets\Growl;
$test="ทดสอบ";
?>
   <?php
                foreach ($ex as $l) {


   echo Growl::widget([
    'type' => Growl::TYPE_DANGER,
    'title' => 'Warning! มียาใกล้หมดอายุภายในอีก 60 วัน',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => 'โปรดตรวจสอบที่ระบบรายงาน',
    'showSeparator' => true,
    'delay' => 2000,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

        }
        ?>

 <?php
                foreach ($low as $l2) {


   echo Growl::widget([
    'type' => Growl::TYPE_WARNING,
    'title' => 'Warning! มียาจำนวนคงเหลือน้อยกว่าขั้นต่ำ',
    'icon' => 'glyphicon glyphicon-exclamation-sign',
    'body' => 'โปรดตรวจสอบที่ระบบรายงาน',
    'showSeparator' => true,
    'delay' => 2000,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

        }
        ?>

            <?php


$this->title = 'รายการยา';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-index">
<?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
            <div class="col-md-2">
    <p>
        <?= Html::a('เพิ่มรายการใหม่', ['create'], ['class' => 'btn btn-danger fa fa-plus']) ?>
    </p>
        </div>
<div class="col-md-6 col-md-offset-0">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'drug_name',
            'drug_supplier',
            //'date_recive:date',
            //'expiration_date:date',
            [
            'label'=>'วันรับสินค้า',

            'format' => 'raw',
            'value'=>function ($data) {
            $strYear = date("Y",strtotime($data->date_recive))+543;
            $strMonth= date("n",strtotime($data->date_recive));
            $strDay= date("j",strtotime($data->date_recive));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
            //return Yii::$app->thaiFormatter->asDate($data->today,'medium');
            },
            ],
            [
            'label'=>'วันหมดอายุ',

            'format' => 'raw',
            'value'=>function ($data) {
            $strYear = date("Y",strtotime($data->expiration_date))+543;
            $strMonth= date("n",strtotime($data->expiration_date));
            $strDay= date("j",strtotime($data->expiration_date));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";
            //return Yii::$app->thaiFormatter->asDate($data->today,'medium');
            },
            ],

            'unitname',
            'total_recive',

             'total_now',
            'status',

                               [
'label'=>'เบิก',

'format' => 'raw',
'value'=>function ($data) {
return Html::a('เบิกยา',['drug-use/create','drug_id'=>$data->id,'drug_name'=>$data->drug_name,'status'=>$data->status,'total_now'=>$data->total_now],['class' => 'btn btn-success']);


},
],

                       [
  'class' => 'yii\grid\ActionColumn',

  'buttonOptions'=>['class'=>'btn btn-default'],
  'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{view}{update}{delete} </div>',
  'options'=> ['style'=>'width:150px;'],
  'buttons'=>[
    'copy' => function($url,$model,$key){
        return Html::a('<i class="glyphicon glyphicon-duplicate"></i>',$url,['class'=>'btn btn-default']);
      }
    ]
],
        ],
    ]); ?>
<?php yii\widgets\Pjax::end() ?>
</div>
