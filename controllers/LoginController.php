<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegistrationForm;
use yii\filters\AccessControl;
use Yii;
use yii\filters\VerbFilter;
use app\models\User;

class LoginController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'login', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
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

    public function debug($arr){
        echo "<pre>";
        var_dump($arr, true);
        echo "</pre>";
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){

        $user = new  User();
        $user->login= 'admin';
        $user->first_name = 'sandro';
        $user->last_name = 'stecuk';
        $user->password = '1111';




       $this->debug($user->save());
        die;

        $model = new LoginForm();

        return $this->render('mlogin',['model'=>$model]);
    }

    public function actionSignup(){

        $model = new RegistrationForm();
        $user = new User();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            $resLogin = $user->find()->where(['login'=>$model->login])->one();

            if($resLogin){
                return $this->render('mregistration', ['model' => $model]);
            }

            $passwordHash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $user->first_name = $model->first_name;
            $user->last_name = $model->last_name;
            $user->login = $model->login;
            $user->password = $passwordHash;

            if($user->save() && $model->login()){
                return $this->redirect('/tasks/index');

            }

        }

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/tasks/index');
        }
        return $this->render('mlogin', [
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


    public function actionRegistration(){

        $model = new RegistrationForm();
        return $this->render('mregistration', ['model' => $model]);
    }


}
