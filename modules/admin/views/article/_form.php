<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Заголовок статьи') ?>

    <?= $form->field($model, 'prearticle')->textarea(['rows' => 3])->label('Краткое превью статьи'); ?>


    <?= 
        $form->field($model, 'content')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'fullscreen',
                ],
            ],
        ])->label('Содержание статьи');
    ?>

    <?= $form->field($model, 'article_category')->dropDownList($categories)->label('Категория статьи'); ?>

    <?= $form->field($Imagemodel, 'image')->fileInput()->label('Добавить картинку') ?>

    <?php //echo $form->field($model, 'article_category')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
