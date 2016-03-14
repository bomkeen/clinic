<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PdVnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$y= (date("Y")+543);
$d=  date("d-m");
$this->title = 'รายการผู้รับบริการวันที่ '.$d.'-'.$y;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pd-vn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'today',
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

</div>
