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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Process form (e.g., send email, save to DB, etc.)
            Yii::$app->session->setFlash('success', 'Your appointment has been booked successfully.');
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);

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
     * actionChangepassword
     *
     * @return void
     */
    public function actionChangepassword()
    {
        $this->layout = 'login';
        $model = new ChangePasswordForm();
        
        if($model->load(Yii::$app->request->post()))
        {
           
            $model->user_id = Yii::$app->user->id;
            $model->current_password = trim($model->current_password);
            $model->new_password = trim($model->new_password);
            $model->confirm_password = trim($model->confirm_password);
            if($model->validate())
            {
                $user = User::findOne(Yii::$app->user->id);
                $user->password = sha1($model->new_password);
                if($user->save()){
                    Yii::$app->session->setFlash('success', 'Password updated successfully!');
                }else{
                    Yii::$app->session->setFlash('error', 'Failed to update password!');
                }
                
                return $this->redirect(['index']);
            }
        }
        
        return $this->render('change-password', [
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
