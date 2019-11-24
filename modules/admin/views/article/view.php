<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = 'Статья: ' .$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Статья', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить статью', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изменить краткое описание', ['set-pre-article', 'id' => $model->id], ['class' => 'btn btn-default'])?>
        <?= Html::a('Добавить картинку', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Изменить категорию', ['set-category', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить статью', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту статью?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'id', 'label'=>'Номер статьи'],
            ['attribute'=>'title', 'label'=>'Заголовок'],
            ['attribute'=>'prearticle', 'label'=>'Превью статьи'],
            ['attribute'=>'content', 'label'=>'Содержание статьи'],
            ['attribute'=>'article_category', 'label'=>'Категория статьи'],
            ['attribute' => 'image','label' => 'Изображение статьи'],
        ],
    ]) ?>

</div>
