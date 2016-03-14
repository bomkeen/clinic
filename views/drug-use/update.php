<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DrugUse */

$this->title = 'Update Drug Use: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drug Uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drug-use-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formu', [
        'model' => $model,
    ]) ?>

</div>
