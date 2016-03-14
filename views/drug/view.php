<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Drug */

$this->title = $model->drug_name;
$this->params['breadcrumbs'][] = ['label' => 'Drugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'drug_name',
            'drug_supplier',
            'date_recive',
            'total_recive',
            'total_now',
            //'updated_at',
            //'created_at',
        ],
    ]) ?>

</div>
