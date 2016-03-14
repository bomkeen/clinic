<?php

namespace app\controllers;

use Yii;
use app\models\DrugUse;
use app\models\Drug;
use app\models\DrugUseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
use yii\behaviors\BlameableBehavior;

/**
 * DrugUseController implements the CRUD actions for DrugUse model.
 */
class DrugUseController extends Controller {
    public $enableCsrfValidation = false;

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

   public function actionPay()
    {
       $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");
        $n=0;
        $m=0;
             
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            
              $c1 = Yii::$app->db->createCommand("SELECT SUM(text) as m
,count(*) as n
FROM drug_use WHERE created_at BETWEEN '$date1' and '$date2' ");
        $q1 = $c1->queryAll();
 foreach ($q1 as $a) {
     
                $m=$a['m'];
                $n=$a['n'];
                

        }
        
            }
        return $this->render('pay',[
            'date1'=>$date1,
            'date2'=>$date2,
            'n'=>$n,
            'm'=>$m,
            ]);
    }
    
    public function actionPayday($date1,$date2) {
         
          $date1 = $date1;
        $date2 = $date2;
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            }
              $sql = "SELECT  * from drug_use WHERE  created_at BETWEEN '$date1' and '$date2'";
              $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        

        return $this->render('payday', [
                    //'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            
        ]);
    }
    
    
    
     public function actionList() {
         
          $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");
            if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            }
              $sql = "SELECT  * from drug_use WHERE  created_at BETWEEN '$date1' and '$date2'";
              $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        

        return $this->render('list', [
                    //'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
            
        ]);
    }
    public function actionIndex() {
        $searchModel = new DrugUseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DrugUse model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DrugUse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($drug_id, $drug_name,$status,$total_now) {
        $model = new DrugUse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $drug = drug::findone($drug_id);
            
            $total = ($drug->total_now - $model->total);
            $drug->total_now = $total;
            $drug->save();
              
            return $this->redirect(['drug-use/list']);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'drug_id' => $drug_id,
                        'drug_name' => $drug_name,
                'status'=>$status,
                'total_now'=>$total_now,
            ]);
        }
    }

    /**
     * Updates an existing DrugUse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DrugUse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['list']);
    }

    /**
     * Finds the DrugUse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DrugUse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DrugUse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
