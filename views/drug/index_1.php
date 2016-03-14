<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DrugSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drugs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Drug', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'drug_name',
            'drug_supplier',
            'date_recive',
            'total_recive',
            // 'total_now',
            // 'updated_at',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
