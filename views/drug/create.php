<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Drug */

$this->title = 'เพิ่มรายการยา';
$this->params['breadcrumbs'][] = ['label' => 'Drugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
