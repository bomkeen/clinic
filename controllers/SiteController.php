<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\data\ActiveDataProvider;




class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionTest() {
        return $this->render('test');
        
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionPrice()
    {
       $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");
        
        $visit_all=0;
                $visit_am=0;
                $am=0;
                $visit_pm=0;
                $pm=0;
                $total=0;
        
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            
              $c1 = Yii::$app->db->createCommand("SELECT 
 sum(case when vn.time BETWEEN '07:00:01' and '21:00:00' THEN 1 ELSE 0 END) as visit_all
,sum(case when vn.time BETWEEN '07:00:01' and '17:00:00' THEN 1 ELSE 0 END) as visit_am
,sum(case when vn.time BETWEEN '07:00:01' and '17:00:00' THEN vn.price ELSE 0 END) as am
,sum(case when vn.time BETWEEN '17:00:01' and '21:00:00' THEN 1 ELSE 0 END) as visit_pm
,sum(case when vn.time BETWEEN '17:00:01' and '21:00:00' THEN vn.price ELSE 0 END) as pm
,sum(case when  vn.price not BETWEEN 0 and 9999999 THEN 1 ELSE 0 end ) as error_price
,SUM(vn.price) as total FROM pd_vn as vn WHERE vn.today between '$date1' and '$date2' ");
        $q1 = $c1->queryAll();
 foreach ($q1 as $a) {
     
                $visit_all=$a['visit_all'];
                $visit_am=$a['visit_am'];
                $am=$a['am'];
                $visit_pm=$a['visit_pm'];
                $pm=$a['pm'];
                $total=$a['total'];

        }
        
            }
        return $this->render('price',[
            'date1'=>$date1,
            'date2'=>$date2,
            'visit_all'=>$visit_all,
            'visit_am'=>$visit_am,
            'am'=>$am,
        'visit_pm'=>$visit_pm,
                'pm'=>$pm,
                'total'=>$total,
            ]);
    }

    public function actionReport() {
        $c = Yii::$app->db->createCommand("SELECT id,SUM(price) as p,today as today FROM pd_vn  where today is not null GROUP BY today");
        $events = $c->queryAll();
        $task=[];
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve['id'];
            $event->title = $eve['p'].' บาท';
            $event->start = $eve['today'];
            $event->
            $event->url =\yii\helpers\Url::to(['/site/visitday','day'=>$eve['today']]);
            $task[] = $event;
            
        }
       
        return $this->render('report',[
            'events'=>$task,
        ]);
        
    }
     public function actionVisitday($day) {
        $date1 = $day;
        $date2 = $day;
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            }
              $sql = "select * from pd_vn where today between '$date1' and '$date2' ";
              $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $rawData,
           'pagination' => ['pageSize' => 20,],
        ]);
            //$searchModel = new RiskSearch();

            return $this->render('visitday', [
                'date1' => $date1,
                'date2' => $date2,
                        //'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider, ]);
        }
    
    public function actionVisit() {
        $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            }
              $sql = "select * from pd_vn where today between '$date1' and '$date2' ";
              $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $rawData,
           'pagination' => ['pageSize' => 2000,],
        ]);
            //$searchModel = new RiskSearch();

            return $this->render('visit', [
                'date1' => $date1,
                'date2' => $date2,
                        //'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider, ]);
        }
        
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
