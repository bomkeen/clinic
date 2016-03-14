<aside class="main-sidebar">

    <section class="sidebar">



        <?=
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'ระบบคลินิค', 'options' => ['class' => 'header']],
                        ['label' => 'ส่งตรวจ', 'icon' => 'fa fa-user-plus', 'url' => ['/pd-person/index']],
                        ['label' => 'ผู้ป่วยในวัน', 'icon' => 'fa fa-calendar', 'url' => ['/pd-vn/index']],
                        
                       
                        ['label' => 'ระบบคลังยา', 'options' => ['class' => 'header']],
                        ['label' => 'รายการยา', 'icon' => 'fa fa-bars', 'url' => ['/drug/index']],
                        ['label' => 'รายการเบิก', 'icon' => 'fa fa-calendar', 'url' => ['/drug-use/list']],
                        
     [
                            'label' => 'ระบบรายงาน', 'icon' => 'fa fa-pie-chart', 'url' => '#',
                            'items' => [
                                ['label' => 'สรุปการเบิกยา', 'icon' => 'fa fa-btc', 'url' => ['drug-use/pay'],],
                                ['label' => 'ปฏิทินรายจ่าย', 'icon' => 'fa fa-calendar-check-o', 'url' => ['site/report'],],
                                ['label' => 'รายงานสรุปค่าใช้จ่าย', 'icon' => 'fa fa-usd', 'url' => ['site/price'],],
                                ['label' => 'รายละเอียดการรับบริการ', 'icon' => 'fa fa-bars', 'url' => ['/site/visit'],],
                                ['label' => 'ประวัติรายบุคคล', 'icon' => 'fa fa-child', 'url' => ['/pd-vn/visitlist'],],
                            ]],
    ['label' => 'Admin Tool', 'options' => ['class' => 'header']],
                        Yii::$app->user->isGuest ?
                                ['label' => 'เข้าสู่ระบบ', 'icon' => 'fa fa-user', 'url' => ['/user/security/login']] :
                                ['label' => 'ออกจากระบบ', 'icon' => 'fa fa-share', 'url' => ['/user/security/logout']],
                        ['label' => 'ลงทะเบียน', 'icon' => 'fa fa-users', 'url' => ['/user/registration/register'], 'visible' => !Yii::$app->user->isGuest],
                     ['label' => 'ตั้งค่า Unit', 'icon' => 'fa fa-cog', 'url' => ['/drug-unit/index'], 'visible' => !yii::$app->user->isGuest],
                        ],
                ]
        )
        ?>

    </section>

</aside>
