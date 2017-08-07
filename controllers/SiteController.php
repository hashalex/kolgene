<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignUp;
use yii\helpers\Html;
use app\models\User;
use yii\helpers\VarDumper;

use app\components\AuthHandler;

class SiteController extends Controller
{
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
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }
    
    public function actionFb()
    {        
        return $this->render('fb_twitter', [
            'type' => 'Facebook',
        ]);
    } 
    
    public function actionTwitter()
    {        
        return $this->render('fb_twitter', [
            'type' => 'Twitter',
        ]);
    }   
    
    /**
    Add user to mysql if user does not exist    
    */
    public function actionAdd()
    {   
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $username = explode(":", $data['username']);
            $username = $username[0];
            $email = explode(":", $data['email']);        
            $email = $email[0];
            $firebase_user_id = explode(":", $data['firebase_user_id']);
            $firebase_user_id = $firebase_user_id[0];
            $firebase_auth_token = explode(":", $data['firebase_auth_token']);
            $firebase_auth_token = $firebase_auth_token[0];
            $method = explode(":", $data['method']);
            $method = $method[0];
                         
            $user = User::findIdentityByAccessToken($firebase_auth_token);
            if($user == null) {                      
                 $user = new User();
                 $user->user_full_name = $username;    
                 $user->firebase_user_id = $firebase_user_id;
                 $user->firebase_auth_token = $firebase_auth_token;
                 if(!empty($email)) {  
                   $user->email = $email;
                 }        
                 $user->login_method = $method;
                 $user->save();    
           }      
        
            if($user->id > 0) {
                Yii::$app->user->login($user, 3600*24*30);
            }
            
           if (!Yii::$app->user->isGuest) {           
             $this->redirect('about');
           } 
           
       }
    }  
        
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {        
        if(Yii::$app->requestedRoute == 'site/index') {
            $this->goHome();
        }
        
        if (!Yii::$app->user->isGuest) {
            $this->redirect('about');          
        } 
        

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
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
     * Displays signup phone page.
     *
     * @return Response|string
     */
    public function actionSignup()
    {        
        return $this->render('signup_phone');
    }
    
     /**
     * Displays signup email page.
     *
     * @return Response|string
     */
    public function actionSignup_email()
    {        
        $model = new SignUp();        
        if ($model->load(Yii::$app->request->post())) {                 
            $user = $model->signupUser();            
            if($user->id > 0) {
                Yii::$app->user->login($user, 3600*24*30);
            }
            
           if (!Yii::$app->user->isGuest) {           
             $this->redirect('about');
           }            
        }
        return $this->render('signup', [
            'model' => $model, 'type' => 'email'
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        if (!Yii::$app->user->isGuest) {
             $logout_button = $this->render('logout');                     
            return $this->render('about', [
            'logout_button' => $logout_button, 
            'user_name' => Yii::$app->user->identity->getUserName()
          ]);          
        } else {
            $this->goHome();
        }
    }
}
