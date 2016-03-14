<?php

namespace app\controllers;

use Yii;
use app\models\PdVn;
use app\models\PdVnSearch;
use app\models\PdVnSearch2;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
date_default_timezone_set('Asia/Bangkok');

/**
 * PdVnController implements the CRUD actions for PdVn model.
 */
class PdVnController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PdVn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PdVnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
////////////////////////// จำนวนแสดง
        $dataProvider->pagination = ['defaultPageSize' => 200];
 //////////// Sort
        $dataProvider->setSort(['defaultOrder' => ['time'=>SORT_DESC],'attributes' => ['time']]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
          
        ]);
    }
    
    
     public function actionVisitlist()
    {
        $searchModel = new PdVnSearch2();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('visitlist', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     public function actionIndex2($day)
    {
         $date1 = $day;
        $date2 = $day;
         if (Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $date1 = $request->post('date1');  
            $date2 = $request->post('date2');  
            }
         $searchModel = new PdVnSearch();
         $sql = "SELECT * from pd_vn where today between '$date1' and '$date2' ";
              $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $rawData,
            'pagination' => ['pageSize' => 15],
        ]);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date1'=>$date1,
            'date2'=>$date2,
        ]);
    }

    /**
     * Displays a single PdVn model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PdVn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionVn($hn,$tel,$name,$hn_y)
    {
        $today=  date("Y-m-d");
        $time=date("H:i:s");
        
        
        $model = new PdVn();
$model->hn=$hn;
$model->tel=$tel;
$model->name=$name;
$model->today=$today;
$model->time=$time;
$model->hn_y=$hn_y;
         $model->insert() ;
            return $this->redirect(['index']);
       
    }
    
    public function actionCreate($hn,$tel,$name)
    {
        $model = new PdVn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'hn'=>$hn,
                'tel'=>$tel,
                'name'=>$name,
            ]);
        }
    }

    /**
     * Updates an existing PdVn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PdVn model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PdVn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PdVn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PdVn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
