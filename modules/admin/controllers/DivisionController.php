<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Division;
use app\models\DivisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DivisionController implements the CRUD actions for Division model.
 */
class DivisionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Division models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DivisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Division model.
     * @param integer $iddivision
     * @param integer $header_idheader
     * @return mixed
     */
    public function actionView($iddivision, $header_idheader)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddivision, $header_idheader),
        ]);
    }

    /**
     * Creates a new Division model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Division();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Division model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iddivision
     * @param integer $header_idheader
     * @return mixed
     */
    public function actionUpdate($iddivision, $header_idheader)
    {
        $model = $this->findModel($iddivision, $header_idheader);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddivision' => $model->iddivision, 'header_idheader' => $model->header_idheader]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Division model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iddivision
     * @param integer $header_idheader
     * @return mixed
     */
    public function actionDelete($iddivision, $header_idheader)
    {
        $this->findModel($iddivision, $header_idheader)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Division model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iddivision
     * @param integer $header_idheader
     * @return Division the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddivision, $header_idheader)
    {
        if (($model = Division::findOne(['iddivision' => $iddivision, 'header_idheader' => $header_idheader])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionLists($id){
        $countDivision = Division::find()
            ->where(['header_idheader' => $id])
            ->count();
        $divisions = Division::find()
            ->where(['header_idheader' => $id])
            ->all();
        if($countDivision > 0){
            echo "<option>Выбрать отдел...</option>";
            foreach ($divisions as $header){
                echo "<option value='".$header->iddivision."'>".$header->name."</option>";
            }
        } else{
            echo "<option> - </option>";
        }
    }
}
