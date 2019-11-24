<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\controllers\behaviors\AccessBehavior;

/**
 * Default controller for the `admin` module
 */
class MainController extends Controller
{

	public function behaviors()
	{
		return [
			AccessBehavior::className(),
		];
	}
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
