
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Изменить превью статьи';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить превью статьи';
?>


<div class="article-preArtice">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="article-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'prearticle')->textarea(['rows' => 3]) ?>

	    <div class="form-group">
	        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>

</div>



