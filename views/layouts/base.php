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

<header>
  <div class="container-fluid mainpic">
    <div class="row mainpic_add">
      <div class="label col-lg-4 col-12">
        <p>Юлия Федорова</p>
        <h1>Психолог психотерапевт</h1>
      </div>
      <div class="mainnav col-lg-8 d-flex flex-wrap-reverse justify-content-around">
          <a href="#" class="burger-menu-button">
            <span></span>
          </a>
          <div class="burger-menu-slide">
            <a href="/base">Главная</a>
            <a href="/base/aboutme">Обо мне</a>
            <a href="/base/workingwith">С чем я работаю</a>
            <a href="/base/workingmethod">Как я работаю</a>
            <a href="/base/#how-come-to-me-content">Стоймость</a>
            <a href="/base/articles">Статьи</a>
            <a href="/base/contacts">Контакты</a>
          </div>
        <!-- /.burger-menu -->
        <ul class="nav col-auto mainnav__nav">
          <li class="nav-item">
            <a class="nav-link active" href="/base">Главная</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Мои услуги</a>
              <ul class="slide-menu">
                <li><a href="/base/aboutme">Обо мне</a></li>
                <li><a href="/base/workingwith">С чем я работаю</a></li>
                <li><a href="/base/workingmethod">Как я работаю</a></li>
                <li><a href="/base/#how-come-to-me-content">Стоймость</a></li>
              </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/base/articles">Статьи</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/base/contacts">Контакты</a>
          </li>
        </ul>
        <ul class="nav col-auto">
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fab fa-facebook-f" href="#"></i>
            </a></li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fab fa-vk" href="#"></i>
            </a></li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fab fa-instagram" href="#"></i>
            </a></li>
        </ul>
      </div>
    </div>

    <div class="row header-about-me">
      <div class="col-lg-6 offset-lg-5 col-md-5 offset-md-6 col-sm-6 offset-sm-6 d-none d-sm-block">
        <p>Кто я</p>
        <p>Я являюсь дипломированным психологом в области решения проблем с жизненными ситуациями, связанными с проблемами на работе, в социлальной среде, выканию сложных конформационных тортов, на которые могут уходить многие часы. Так же я решаю семейные проблемы и работаю с детьми.</p>
         <button type="button" class="btn btn-outline-light justify-content-center" data-target="anchor" goal="#how-come-to-me-content">Записаться на прием</button>
      </div>
      <div class="imageonsmalcreen d-sm-none">
        <img src="/images/mobile-main.jpg" alt="психолог в Дмитрове">
      </div>
    </div>
    <div class="row d-sm-none">
      <div class="col text-center px-5 py-4 header-about-me-small">
        <h2 class="mb-3">Кто я</h2>
        <p>Я являюсь дипломированным психологом в области решения проблем с жизненными ситуациями, связанными с проблемами на работе, в социлальной среде, выканию сложных конформационных тортов, на которые могут уходить многие часы. Так же я решаю семейные проблемы и работаю с детьми.</p>
      </div>
    </div>
  </div>
</header>
        <?= $content ?> 

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Юлия Федорова 2017-2019</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

