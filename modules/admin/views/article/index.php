<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\grid\GridView;
use app\models\Category;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Создание статей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать новую статью', ['create'], ['class' => 'btn btn-outline-primary']) ?>
    </p>
    <?php Pjax::begin(['timeout'=>4000]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны статьи с {begin} по {end}, всего статей {totalCount}<br>Страница {page}, всего страниц {pageCount}",
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '(не задано)'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'id', 'label'=>'Номер статьи'],
            ['attribute'=>'title', 'label'=>'Заголовок'],
            ['attribute'=>'prearticle', 'label'=>'Краткое содержание статьи','value' => function ($model) 
                {
                    return StringHelper::truncate($model->content, 50);
                }],
            ['attribute'=>'content', 'label'=>'Содержание статьи','value' => function ($model) 
                {
                    return StringHelper::truncate($model->content, 100);
                }
            ],
            ['attribute'=>'article_category', 'label'=>'Категория статьи', 'value'=>'category.title'],
            [
                'format'=>'html',
                'label'=>'Изображение картинки',
                'value'=>function($data)
                {
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', ['article/view','id' => $model->id]);
                    },

                    'update' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-paint-brush" aria-hidden="true"></i>', ['article/update','id' => $model->id]);
                    },

                    'delete' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['article/delete','id' => $model->id],
                            ['data-method' => 'post'],);
                    }

                ]       
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>


</div>
