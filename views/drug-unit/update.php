<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DrugUnit */

$this->title = 'Update Drug Unit: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drug Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drug-unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
