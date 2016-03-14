<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PdPerson */

$this->title = 'รายละเอียดคนไข้';
$this->params['breadcrumbs'][] = ['label' => 'Pd People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pd-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcreate', [
        'model' => $model,
        'newhn'=>$newhn,
        'hn_y'=>$hn_y,
    ]) ?>

</div>
