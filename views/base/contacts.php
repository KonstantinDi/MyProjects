
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\sendForm;
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\assets\AppAsset;
use yii\bootstrap4\Alert;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $content string */
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
<div class="mainContactsContainer">
<header>
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
</header>
<main>
	<div class="container-fluid conteinerContacts mt-5">
		<div class="row block_place col-xl-8 col-lg-10 m-auto justify-content-around align-items-center py-4 shadow">
			<p class="text-center col-12 m-0 mb-md-4">Места проведения консультаций</p>
				<div class="map col-md-6 col-12 mt-lg-0 order-1 order-md-0">
					<iframe class="shadow-sm" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa47e38a95b80c8efad4f020503880b5e8992cf351cf5049878a26152452935fd&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
				</div>
				<div class="where col-md-5 col-12 mt-4 mt-lg-0">
					<h2 class="text-center">Москва</h2>
					<p class="text-center"><i class="fas fa-map-marker-alt"></i>ул. Новослободская д. 26</p>
					<p>От метро Менделеевская 5 минут пешком, необходимо иметь при себе паспорт. Вход на противоположной стороне дороги от банка ВТБ.
					</p>
				</div>
				<div class="map col-md-6 col-12 mt-0 mt-md-4">
					<iframe class="shadow-sm" src="https://yandex.ru/map-widget/v1/?um=constructor%3A074ac975c36a93a192ec46bfd39ffcaa95e8d0418b7a5a817a65b17cb269b9e5&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
				</div>
				<div class="where col-md-5 col-12 mt-4">
					<h2 class="text-center">Дмитров</h2>
					<p class="text-center"><i class="fas fa-map-marker-alt"></i> ул. Московская д. 2</p>
					<p>Уютный кабинет, находиться напротив кинотеатра Планета, 5 минут пешком от станции Дмитров. Входнаходится с торца здания, поднимаетесь на второй этаж подходите к стойке ресепшена, скажите что вы к психологу.
					</p>
				</div>
		</div>
		<div class="row block_priem col-xl-8 col-lg-10 mx-auto p-4 justify-content-center my-5 shadow">
    
      <?php Pjax::begin(['timeout'=> 4000]); ?>
      <!-- Форма отправки заявки -->
			<?php $f = ActiveForm::begin(['options'=>['data-pjax'=>true]]); ?>
				<h3 class="text-center">Записаться на прием</h3>
				<div class="row mt-4">
					<?= $f->field($sendForm,'clientName',['options' => ['class' => 'form-group col-md-4 col-12']])->label('Ваше имя')?>
					<?= $f->field($sendForm,'clientSellPhone',['options' => ['class' => 'form-group col-md-4 col-12']])->label('Ваш телефон') ?>
					<?= $f->field($sendForm,'clientEmail',['options' => ['class' => 'form-group col-md-4 col-12']])->label('Ваш Email') ?>
				</div>
				<div class='row'>
					<?= $f->field($sendForm,'clientProblemDescription', ['options' => ['class' => 'form-group col-12']])->textarea(['rows'
=>5])->label('Краткое описание запроса') ?>
				</div>

        <?= $f->field($sendForm, 'agreetoPersonalData', [
          'template' => "{input} {label} {error}",
        ])->checkbox([
          'uncheck'=>'',
          'class' => 'css-form-checkbox',
        ],false)->label('Даю согласие на обработку персональных данных',[
          'class' => 'css-form-label-checkbox',

        ]); ?>
        
				<div class="row no-gutters mt-md-3">
					<?=Html::submitButton(('Отправить'), ['class' => 'col-12 sendRequest mt-1 mt-md-0']); ?>
				</div>

        <!-- Вывод сообение о доставленном письме -->
            <?php if (Yii::$app->session->hasFlash('success'))
            { 
              echo Alert::widget([
                  'options' => [
                      'class' => 'alert-success mt-3 mb-0',
                  ],
                  'body' => 'Ваше сообщение отправлено!',
              ]);
            }
            elseif(Yii::$app->session->hasFlash('warning') )
            { 
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-warning mt-3 mb-0',
                ],
                'body' => 'Письмо не ушло, проблема с сервером!',
            ]);
            } 
            ?>
            <!-- Конец вывода сообение о доставленном письме -->
			<?php ActiveForm::end(); ?>
      <?php Pjax::end(); ?>
      <!-- Конец формы заявки -->


		</div>
	</div>
  
</main>
<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Юлия Федорова 2017-2019</p>
    </div>
</footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

