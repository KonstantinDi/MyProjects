<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны категории с {begin} по {end}, всего категорий {totalCount}<br>Страница {page}, всего страниц {pageCount}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id', 'label'=>'Номер категории'],
            ['attribute'=>'title', 'label'=>'Заголовок категории'],

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', ['category/view','id' => $model->id]);
                    },

                    'update' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-paint-brush" aria-hidden="true"></i>', ['category/update','id' => $model->id]);
                    },

                    'delete' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['category/delete','id' => $model->id],
                            ['data-method' => 'post'],);
                    }

                ]       
            ]
        ],
    ]); ?>


</div>
