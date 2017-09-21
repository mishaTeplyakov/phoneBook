<?php

namespace app\controllers;

use app\models\Header;
use app\models\LoginForm;
use app\models\People;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{


    public function beforeAction($action){
    $this->enableCsrfValidation = false;
    return parent :: beforeAction($action);
    }
    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
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

    /**
     * Displays homepage.
     * @return string
     *
     * вывод на главную страницу сайта, список телефонных контактов
     *
     */
    public function actionIndex()
    {
        $headers = Header::find('name')->all();
        return $this->render('index', compact('headers'));
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            echo 'Пользователь Гость';
            return $this->goHome();
        }


        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('\login', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $query = People::find()->where(['like','fio',$q])->all();
        //$peoples =
            People::find()
            ->select(['categoriya','posada','fio','phone','inside_phone','mts_phone','lugakom_phone'])
            ->where(['like','fio',$q])->all();
        return $this->render('search',compact('query'));
    }

}
