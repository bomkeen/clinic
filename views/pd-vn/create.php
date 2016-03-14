<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PdVn */

$this->title = 'ข้อมูลการส่งตรวจ';
$this->params['breadcrumbs'][] = ['label' => 'Pd Vns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pd-vn-create">
<?php 

?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formsend', [
        'model' => $model,
        'hn'=>$hn,
        'tel'=>$tel,
        'name'=>$name,
    ]) ?>

</div>
