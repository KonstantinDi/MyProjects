<?php
namespace app\controllers;

use yii;
use yii\web\controller;
use app\models\LoginForm;
use app\models\adminModels\AdminTable;

class AuthController extends Controller
{
	public function actionLogin()
    {
    	$this->layout='otherpages'; //указываем с каким шаблоном работать

        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        $model->password = '';
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionTest()
    {
    	$admin = AdminTable::findone(8);
    	Yii::$app->user->logout($admin);
    	if(Yii::$app->user->isGuest)
    	{
    		echo 'ты гость';
    	}
    	else
    	{
    		echo'Ты знаком мне';
    	}


    }
}

?>