<?php

namespace app\controllers;

use Yii;
use app\models\Drug;
use app\models\DrugSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DrugController implements the CRUD actions for Drug model.
 */
class DrugController extends Controller
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

    public function actionEx()
    {
           $sql = Yii::$app->db->createCommand("select *
from drug d
where DATEDIFF(d.expiration_date,now()) <180 and d.status='Y'");

        $ex = $sql->queryAll();

              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $ex,
            'pagination' => FALSE,
        ]);

        return $this->render('ex', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }


    public function actionLow()
    {
           $sql = Yii::$app->db->createCommand("select *
from drug d
where d.total_now < d.low_limit and d.status='Y'");

        $ex = $sql->queryAll();

              $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',//
            'allModels' => $ex,
            'pagination' => FALSE,
        ]);

        return $this->render('low', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    public function actionIndex()
    {
           $sql = Yii::$app->db->createCommand("select
d.drug_name as drug_name
,d.expiration_date as expiration_date
,d.total_now as total
from drug d
where DATEDIFF(d.expiration_date,now()) <180 and d.status='Y' limit 1");

        $ex = $sql->queryAll();

         $sql2 = Yii::$app->db->createCommand("select
d.drug_name as drug_name
,d.expiration_date as expiration_date
,d.total_now as total
from drug d
where d.total_now < d.low_limit and d.status='Y' limit 1");

        $low = $sql2->queryAll();




        $searchModel = new DrugSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
         'low'=>$low,
            'ex'=>$ex,
        ]);
    }
public function actionIndex2()
    {
        $searchModel = new DrugSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Drug model.
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
     * Creates a new Drug model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Drug();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           $model->total_now=$model->total_recive;
         $model->save() ;
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Drug model.
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
     * Deletes an existing Drug model.
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
     * Finds the Drug model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Drug the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Drug::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
