<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
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
<?php $this->beginBody() ?>
<body>
  <div class="wrapper">
    <header>
      <div class="container-fluid background">
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
      </div>
    </header>
    <div class="contenter">
    <?= $content // Контент внутри внутри шаблона (вид) ?>
    </div>
    <footer class="footer" style="flex: 0 0 auto;">
        <div class="container">
            <p class="text-center m-0">&copy; Юлия Федорова 2017-2019</p>
        </div>
    </footer>
  </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
