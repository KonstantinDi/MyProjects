<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Видео';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить новое видео', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "Показаны видео с {begin} по {end}, всего видеороликов {totalCount}<br>Страница {page}, всего страниц {pageCount}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'id', 'label'=>'Номер видеоролика'],
            ['attribute'=>'title', 'label'=>'Заголовок видеоролика'],
            ['attribute'=>'link', 'format'=>'raw', 'label'=>'Ссылка на видеоролик'],
            ['attribute'=>'category_id', 'label'=>'Категория видеоролика', 'value'=>'category.title'],

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', ['videos/view','id' => $model->id]);
                    },

                    'update' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-paint-brush" aria-hidden="true"></i>', ['videos/update','id' => $model->id]);
                    },

                    'delete' => function($name, $model, $key){
                        return Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['videos/delete','id' => $model->id],
                            ['data-method' => 'post'],);
                    }

                ]       
            ]
        ],
    ]); ?>


</div>
