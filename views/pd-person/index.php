<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\View;



$this->title = 'ส่งหาหมอ';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pd-person-index">




<?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>
    <div class="row">

    <div class="col-md-6 col-md-offset-2">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <div class="col-md-3 col-md-offset-1">
             <p>
        <?= Html::a('เพิ่มคนไข้รายใหม่', ['create'], ['class' => 'btn btn-danger fa fa-user-plus']) ?>
    </p>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'hn',
            'hn_y',
//            [
//'attribute' => 'regdate',
//
//'format' => ['date', 'php:Y-M-d'],
//
//],
            //'regdate:date',
//           [
//               'attribute'=>'regdate',
//               'format'=>'html',
//               'value'=>function($model, $key, $index, $column){
//
// return Yii::$app->thaiFormatter->asDate($model->regdate,'medium'); //short,medium,long,full
//
// //return Yii::$app->formatter->asDateTime($model->created_at,'medium');
// }],
            'name',
            'tel',
            'age',

[
'label'=>'ส่งหาหมอ',

'format' => 'raw',
'value'=>function ($data) {
return Html::a('ส่งตรวจ',['pd-vn/vn','hn'=>$data->hn,'name'=>$data->name,'tel'=>$data->tel,'hn_y'=>$data->hn_y]);


},
],
        [
'label'=>'แก้ไขข้อมูล',

'format' => 'raw',
'value'=>function ($data) {
return Html::a('แก้ไขข้อมูล',['pd-person/update','id'=>$data->id,'hn'=>$data->hn,'name'=>$data->name,'tel'=>$data->tel,'hn_y'=>$data->hn_y]);


},
],
            [
  'class' => 'yii\grid\ActionColumn',

  'buttonOptions'=>['class'=>'btn btn-default'],
  'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{view}{delete} </div>',
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
<?php
$this->registerJs("");
?>
