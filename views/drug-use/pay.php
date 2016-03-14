<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\web\Session;

$session = Yii::$app->session;
   
 ?>
<div class='row'>
    <div class="col-md-12">
        <div class="well">
    <form method="POST" class="form-inline">
        <div class="form-group">
         <label for="date1">ระหว่าง:</label>
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
                
            ],
        ]);
        ?>
          <label for="date2">ถึง:</label>
       
        <?php
        echo yii\jui\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'changeMonth' => true,
                'changeYear' => true,
              
            ]
        ]);
        ?>
         </div>
      
        <button class='btn btn-danger'>ประมวลผล</button>
   
    </form>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                
                ข้อมูลสรุประหว่างวันที่ <?php echo $date1 ;?> ถึง <?php echo  $date2;?>
            </div>
            <div class="panel panel-body">
                <?= Html::a('จำนวนการเบิกรวม '.$n.' รายการ', ['drug-use/payday','date1'=>$date1,'date2'=>$date2], ['class' => 'btn btn-success fa fa-th fa-2x']) ?>
                
                
                <h3><div class="label label-success fa fa-btc">  คิดเป็นเงิน <?php echo $m;?> บาท</div></h3>
            </div>
 
        </div>
        
        
    </div>
</div>




