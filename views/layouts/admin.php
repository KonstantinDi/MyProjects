<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?php
        NavBar::begin([
            'brandLabel' => 'Юлия Федорова Психолог',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-xl navbar-dark bg-primary',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/admin']],
                ['label' => 'Статьи', 'url' => ['/admin/article']],
                ['label' => 'Категории', 'url' => ['/admin/category']],
                ['label' => 'Видео', 'url' => ['/admin/videos']],

                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                    '<li>'
                    . Html::beginForm(['/auth/logout'], 'post', ['class'=>'my-0'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'btn btn-primary']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>

    <?php
        //хлебные крошки
        echo Breadcrumbs::widget([
        'itemTemplate' => "<li>{link}<i class='fa fa-angle-right'></i></li>\n",
            'homeLink' => [
                'label' => 'Главная ',
                'url' => Yii::$app->homeUrl,
                'title' => 'Главная страница админки',
                'class' => 'mx-2',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumb', 'style' => '', ],
        ]);
        // конец хлебных крошек
    ?>      
        <?= Alert::widget() ?>

        <!-- Далее расположен контетн админки -->
        <div class="container contenter">
            <?= $content ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-center">&copy; Юлия Федорова Психолог </p>
            </div>
        </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
