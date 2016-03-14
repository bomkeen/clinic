<?php
use yii\helpers\Html;
use yii\helpers\Url;
$sql = Yii::$app->db->createCommand("select 
count(*) as n
from drug d 
where DATEDIFF(d.expiration_date,now()) <180 and d.status='Y'");
        
        $ex = $sql->queryAll();
        foreach($ex as $noti1){
            $total=$noti1['n'];
        }
         $sql2 = Yii::$app->db->createCommand("select 
count(*) as n
from drug d 
where d.total_now < d.low_limit and d.status='Y'");
        
        $low = $sql2->queryAll();
         foreach($low as $noti2){
            $total2=$noti2['n'];
        }
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="<?php echo Url::toRoute('site/index');?>" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
             
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <?= Html::a('ยาใกล้หมดอายุจำนวน '.$total.' รายการ', ['drug/ex'], ['class' => ' fa fa-bell-o']) ?>
                 
                </li>
                 <li class="dropdown notifications-menu">
                    <?= Html::a('จำนวนยาเหลือน้อย '.$total2.' รายการ', ['drug/low'], ['class' => 'fa fa-bell-o']) ?>
                 
                </li>
                 
            
            
            </ul>
        </div>
    </nav>
</header>
