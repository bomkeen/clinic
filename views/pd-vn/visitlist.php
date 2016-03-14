<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PdVnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$y= (date("Y")+543);
$d=  date("d-m");
$this->title = 'ค้นหาประวัติการรับบริการรายบุคคล';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pd-vn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>


     <div class="row">

    <div class="col-md-6 col-md-offset-2">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
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
            'time',
            'hn',
            'hn_y',
            'name',
            'price',
            // 'time',
            // 'pttype',
            // 'price',
            // 'hn',
            // 'hn_y',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php yii\widgets\Pjax::end() ?>
</div>
