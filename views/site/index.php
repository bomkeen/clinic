<?php


use yii\db\Query;
use yii\helpers\Url;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>คลินิคหมอประสิทธิ์</h2>
        <?= Html::img('../img/picture.gif');?>
      
        <?php 
        
        //$date1=  "2015-10-01";
        //$date2="2016-02-31";
        
                $date1 = date('Y-m-d');
              $date2 = "2016-02-15";
             // $date3 = $date2-$date1;
        
        //$date3=  date_diff($date2,$date1);
        //echo $date1;
        //echo $date2;
       
        $date3=(strtotime($date2) - strtotime($date1))/  ( 60 * 60 * 24 );
        
        //echo $date3;
//	 function DateDiff($strDate1,$strDate2)
//	 {
//				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
//	 }
//	
//
//	
        ?>
        
    </div>
</div>
