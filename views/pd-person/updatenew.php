<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PdPerson */

$this->title = 'แก้ไขข้อมูลของ: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pd People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pd-person-update">

    <h1><?= Html::encode($this->title) ?> EDIT</h1>

    <?= $this->render('_formnew', [
        'model' => $model,
         'hn'=>$hn,
                'tel'=>$tel,
                'name'=>$name,
        'hn_y'=>$hn_y,
        'id'=>$id
    ]) ?>

</div>
