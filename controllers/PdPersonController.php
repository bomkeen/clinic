<?php

namespace app\controllers;

use Yii;
use app\models\PdPerson;
use app\models\SearchPdPerson;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PdVn;


/**
 * PdPersonController implements the CRUD actions for PdPerson model.
 */
class PdPersonController extends Controller
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
     * Lists all PdPerson models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPdPerson();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PdPerson model.
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
     * Creates a new PdPerson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PdPerson();

         $c = Yii::$app->db->createCommand("SELECT (MAX(hn)+1) as newhn FROM pd_person");
$q = $c->queryAll();
foreach ($q as $a) {
           $newhn=$a['newhn'];;

        }
        /////// เติม y ใน hn_y เพื่อไว้จับตัวล่าสุด
        $sql = Yii::$app->db->createCommand("SELECT RIGHT(MAX(hn_y),4)+1 as newhn FROM pd_person where hn_y like 'Y%'");
$q2 = $sql->queryAll();
$year=date("Y")+543;
$yearc=  date("Y");

if($yearc< date("Y")){

    $hn_y='Y'.$year.'/0000';
}
 else {
    foreach ($q2 as $a2) {

           $hn_y='Y'.$year.'/'.$a2['newhn'];

        }
}
$today=  date("Y-m-d");
        $time=date("H:i:s");

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $vn = new PdVn();
$vn->hn=$model->hn;
$vn->tel=$model->tel;
$vn->name=$model->name;
$vn->today=date("Y-m-d");
$vn->time=date("H:i:s");
$vn->hn_y=$model->hn_y;
         $vn->insert() ;
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'newhn'=>$newhn,
                'hn_y'=>$hn_y,
            ]);
        }
    }

    /**
     * Updates an existing PdPerson model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   public function actionUpdate($id,$hn,$tel,$name,$hn_y)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $vn = new PdVn();
$vn->hn=$model->hn;
$vn->tel=$model->tel;
$vn->name=$model->name;
$vn->today=date("Y-m-d");
$vn->time=date("H:i:s");
$vn->hn_y=$model->hn_y;
         $vn->insert() ;
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'hn'=>$hn,
                'tel'=>$tel,
                'name'=>$name,
                'hn_y'=>$hn_y,
                'id'=>$id
            ]);
        }
    }

  public function actionUpdatenew($id,$hn,$tel,$name,$hn_y)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $vn = new PdVn();
$vn->hn=$model->hn;
$vn->tel=$model->tel;
$vn->name=$model->name;
$vn->today=date("Y-m-d");
$vn->time=date("H:i:s");
$vn->hn_y=$model->hn_y;
         $vn->insert() ;
            return $this->redirect(['index']);
        } else {
                    $sql = Yii::$app->db->createCommand("SELECT RIGHT(MAX(hn_y),4)+1 as newhn FROM pd_person where hn_y like 'Y%'");
$q2 = $sql->queryAll();
$year=date("Y")+543;
$yearc=  date("Y");

if($yearc< date("Y")){

    $hn_y='Y'.$year.'/0000';
}
 else {
    foreach ($q2 as $a2) {

           $hn_y='Y'.$year.'/'.$a2['newhn'];

        }
}
            return $this->render('updatenew', [
                'model' => $model,
                'hn'=>$hn,
                'tel'=>$tel,
                'name'=>$name,
                'hn_y'=>$hn_y,
                'id'=>$id
            ]);
        }
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PdPerson::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
