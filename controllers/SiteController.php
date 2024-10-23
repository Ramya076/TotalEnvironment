<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\ForbiddenHttpException;
use app\models\User;
use app\models\AppointmentForm;
use app\models\Enquiry;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
    // public function beforeAction($action)
    // {
    //     if ($action->id === 'login') {
    //         // Allow access to the login action
    //         return parent::beforeAction($action);
    //     } else {
    //         // Check if the user is logged in
    //         if (Yii::$app->user->isGuest) {
    //             return $this->redirect(['login']);
    //         }
    //         return parent::beforeAction($action);
    //     }
    // }
    

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new AppointmentForm();
        $enquiry = new Enquiry();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Process form (e.g., send email, save to DB, etc.)
            Yii::$app->session->setFlash('success', 'Your appointment has been booked successfully.');
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
            'enquiry'=>$enquiry
        ]);

    }
    public function actionAppointment()
    {
        $model = new AppointmentForm();
        $enquiry = new Enquiry();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Process form (e.g., send email, save to DB, etc.)
            Yii::$app->session->setFlash('success', 'Your appointment has been booked successfully.');
            return $this->redirect(['index']);
        }
       

    }

    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
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
    public function actionEnquiry()
    {
        $model = new Enquiry();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Your Enquiry has been submitted successfully.');

            return $this->redirect(['index']);
        }
       
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

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            // Log the error
            Yii::error($exception->getMessage());

            // Check the type of error and handle it accordingly
            if ($exception instanceof \yii\web\NotFoundHttpException) {
                return $this->render('notFound', ['exception' => $exception]);
            } else {
                return $this->render('error', ['exception' => $exception]);
            }
        }
    }
}
