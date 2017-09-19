<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\People;
use app\models\PeopleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeopleController implements the CRUD actions for People model.
 */
class PeopleController extends Controller
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
     * Lists all People models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeopleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single People model.
     * @param integer $idpeople
     * @param integer $division_iddivision
     * @return mixed
     */
    public function actionView($idpeople, $division_iddivision)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpeople, $division_iddivision),
        ]);
    }

    /**
     * Creates a new People model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new People();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpeople' => $model->idpeople, 'division_iddivision' => $model->division_iddivision]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing People model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpeople
     * @param integer $division_iddivision
     * @return mixed
     */
    public function actionUpdate($idpeople, $division_iddivision)
    {
        $model = $this->findModel($idpeople, $division_iddivision);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpeople' => $model->idpeople, 'division_iddivision' => $model->division_iddivision]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing People model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpeople
     * @param integer $division_iddivision
     * @return mixed
     */
    public function actionDelete($idpeople, $division_iddivision)
    {
        $this->findModel($idpeople, $division_iddivision)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the People model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpeople
     * @param integer $division_iddivision
     * @return People the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpeople, $division_iddivision)
    {
        if (($model = People::findOne(['idpeople' => $idpeople, 'division_iddivision' => $division_iddivision])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
