<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\DrugUse */

$this->title = 'เบิกยา  ::  ';
$this->params['breadcrumbs'][] = ['label' => 'Drug Uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="drug-use-create">

    <h1><?= Html::encode($this->title) .$drug_name ?></h1>
    <?php 
    if($status=="N"){ ?>
        
    <h1><div class="label label-danger">รายการนี้ยกเลิกการใช้แล้ว</div></h1>
    
    <?php 
    
        return;
    }
    
    ?>

    <?= $this->render('_formc', [
        'model' => $model,
         'drug_id'=>$drug_id,
                'drug_name'=>$drug_name,
        'total_now'=>$total_now,
    ]) ?>

</div>
