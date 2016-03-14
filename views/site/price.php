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
            <div class="panel panel-body"
            <ul class="list-group">
                <li class="list-group-item" >จำนวนคนไข้ทั้งหมด<span class="badge"><?php echo $visit_all;?> คน</span></li>
                <li class="list-group-item">จำนวนคนไข้ช่วงเช้า<span class="badge"><?php echo $visit_am;?> ตน</span></li>
                <li class="list-group-item">จำนวนรายได้ช่วงเช้า<span class="badge"><?php echo $am;?> บาท</span></li>
                <li class="list-group-item">จำนวนคนไข้ช่วงเย็น<span class="badge"><?php echo $visit_pm;?> คน</span></li>
                <li class="list-group-item">จำนวนรายได้ช่วงเย็น<span class="badge"><?php echo $pm;?> บาท</span></li>
                <li class="list-group-item list-group-item-success">จำนวนรายได้ทั้งหมด<span class="badge"><?php echo $total;?> บาท</span></li>
  </ul>
        </div>
        
        
    </div>
</div>




