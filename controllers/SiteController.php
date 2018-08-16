<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;

use app\models\Slider;
use app\models\TxtForm;

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


        $this -> layout = 'slider'; // подключаем свой шаблон


        $slider = Slider::find() -> all(); // выборка из бд

        $text = TxtForm::find() -> all();

        return $this -> render('index', compact('slider','text')); //рендерим вьюшку и отправляем в ее объект
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


// Добавлено

    public function actionSignup(){ // экшен регистрации
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        } // выкидываем пользователя если он уже авторизован

        $model = new SignupForm(); // создаем новый объект для модели
        if($model->load(Yii::$app->request->post()) && $model->validate()){ //проверяем на загрузку данных из формы и на валидацию из правил
            $user = new User(); // создаем новый объект user
            $user->username = $model->username; // записываем в его логин
            $user->password = Yii::$app->security->generatePasswordHash($model->password); // записываем в него хэштрованный пароль

            if($user->save()){ // сохраняем в БД и если всё удачно, делаем редирект на главную страницу
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model')); // рендерим вьюшку
    }

    public function actionArticle(){
        return $this -> render('article');
    }

}
