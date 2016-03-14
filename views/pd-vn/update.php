<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PdVn */

$this->title = 'Update Pd Vn: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pd Vns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pd-vn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
