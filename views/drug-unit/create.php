<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DrugUnit */

$this->title = 'ตั้งค่า หน่วยยา';
$this->params['breadcrumbs'][] = ['label' => 'Drug Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-unit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
