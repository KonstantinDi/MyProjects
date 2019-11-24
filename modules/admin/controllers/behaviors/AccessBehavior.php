<?php
namespace app\modules\admin\controllers\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class AccessBehavior extends Behavior
{

	public function events()
	{
		return [
			Controller::EVENT_BEFORE_ACTION => 'checkAccess'
		];
	}

	public function checkAccess()
	{
		if(Yii::$app->user->isGuest)
		{
			// return Yii::$app->controller->redirect(['/base/index']); // это выбрасывала на главную
			throw new NotFoundHttpException;
		}
	}
}

?>