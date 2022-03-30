<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use backend\models\SignupAdminForm;
use backend\models\EmployeeSignupForm;
use backend\models\User;
use common\models\Employee;
use common\models\Holiday;
use common\models\Leave;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','signup','users'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalEmployee = Employee::find()->count();
        $totalLeave = Leave::find()->count();
        $totalHoliday = Holiday::find()->count();
        $totalAdmin = User::find()->count();
        return $this->render('index' , [
            'totalEmployee' => $totalEmployee,
            'totalLeave' => $totalLeave,
            'totalHoliday' => $totalHoliday,
            'totalAdmin' => $totalAdmin
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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

    
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupAdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'New Admin User Successfully Created');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

   

    public function actionUsers() {
        $dataProvider= new ActiveDataProvider([
            'query' => User::find()
        ]);
        return $this->render('users' , [
            'dataProvider' => $dataProvider
        ]);
        
    }

}
