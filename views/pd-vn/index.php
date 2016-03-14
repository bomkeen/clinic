<?php

use yii\helpers\Html;
use yii\grid\GridView;



$y= (date("Y")+543);
$d=  date("d-m");

//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">
        <?php $this->title = 'รายการผู้รับบริการวันที่ '.$d.'-'.$y; ?>
    </div>


    <div class="col-md-3 col-md-offset-3">
             <p>
        <?= Html::a('ส่งตรวจใหม่', ['pd-person/index'], ['class' => 'btn btn-danger fa fa-user-plus']) ?>
    </p>
        </div>
</div>
<div class="row">
    <div class="col-md-12" >
<div class="pd-vn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//'today:date',
        [
'label'=>'วันที่รับบริการ',

'format' => 'raw',
'value'=>function ($data) {
        $strYear = date("Y",strtotime($data->today))+543;
		$strMonth= date("n",strtotime($data->today));
		$strDay= date("j",strtotime($data->today));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
//return Yii::$app->thaiFormatter->asDate($data->today,'medium');


},
],
           //'today:date:วันที่สร้าง',
            'time',
            'hn',
            'hn_y',
            'name',
            'price',
           

                    [
'label'=>'บันทึกข้อมูล',

'format' => 'raw',
'value'=>function ($data) {
return Html::a('ลงค่าใช้จ่าย',['pd-vn/update','id'=>$data->id]);


},
],

            [
    'class' => 'yii\grid\ActionColumn',
    'header'=>'Action',
    'template'=>'{view}{delete}'
],
        ],
    ]); ?>

</div>
</div></div>
