<?php

namespace app\controllers;

use app\components\creater\PassportCreater;
use app\components\creater\UserCreater;
use app\models\Gangster;
use app\models\Gun;
use app\models\Team;
use app\models\User;
use Yii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     *
     * @return string
     */
    public function actionIndex()
    {
        $users = User::find()->limit(10)->all();
        $gangsters = Gangster::find()->all();
        $guns = Gun::find()->all();
        return $this->render('index', [
            'users' => $users,
            'gangsters' => $gangsters,
            'guns' => $guns,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionT()
    {
        $users = User::find()->/*asArray()->*/limit(20)->all();
        //$email = ArrayHelper::getColumn($users, 'email');
        //$email = ArrayHelper::index($users, 'email');
        //$email = ArrayHelper::index($users, 'email', 'name');
        //ArrayHelper::multisort($users, ['age', 'name'], [SORT_ASC, SORT_DESC]);
        //$users = ArrayHelper::map($users, 'name', 'name');
        $users = ArrayHelper::toArray($users,[
            User::class =>[
                'id',
                'name',
                'age',
            ]
        ]);

        debug($users); die;

        return $this->render('about');
    }
}
