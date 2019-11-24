<?php
use app\models\sendForm;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Nav;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap4\Alert;

?>

<?php
$this->registerJsFile('/js/anchor.js',['position'=>$this::POS_END],'main-index');
?>

<main>
	<div class="container-fluid">
	<section class="wich-probems-i-work">
		<div class="problems">
			<div class="row">
				<div class="col text-center py-4">
						<h2>С какими проблемами я работаю</h2>
				</div>
			</div>
			<div class="row cards">
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body justify-contnet-center">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
							<a href="#" class="btn btn-outline-primary">Подробнее</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body justify-contnet-center">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text px-">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.Такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body justify-contnet-center">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text px-">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text px-">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text px-">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 px-4 mb-5">
					<div class="card text-center">
						<div class="card-body">
							<img src="/images/problemlue.png" alt="" class="card-img-top px-5">
							<h3 class="card-title">Проблема №1</h3>
							<p class="card-text px-">Это такая проблема, которую решить можно с помощью меня, вы приходите ко мне платите свои звонкие монеты и получаете решение проблемы.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- cards -->
		</div>
	</section>
	<section class="how-come-to-me">
		<div class="row">
			<p class="col-12 text-center py-4">Как записаться ко мне на прием</p>
		</div>
		<div class="row how-come-to-me-content py-5 justify-content-around">
			<div class="col-xl-6 mx-md-5 mx-5 mx-xl-0 px-md-5 px-4 px-xl-0">
				<h3>Возможны два типа проведения консультаций</h3>
				<p class="pl-3">1) Очные консультации, проходят в кабинетах, по адресам:<br> a) г. Дмитров ул. Профессиональоная д. 5 (ТЦ ГЕЛИОС)<br>б) г. Москва ул. Новослободская, д. 26.</p>
				<p class="pl-3">2) Заочная консультация, проходит по Skype.</p>
				<div>
					<h4>Для проведения очной консультации необходимо:</h4>
					<p class="pl-3">Заполнить заявку на проведение консультации указав свои (имя, телефон либо e-mail и кратко описать запрос). Затем я перезваниваниваю Вам для согласования времени и даты консультации.</p>
				</div>
				<div>
					<h4>Для проведения заочной консультаци по Skype необходимо:</h4>
					<p class="pl-3">Заполнить заявку на проведение консультации, написав что Вы хотите провести консультацию заочно, указать свои (имя, телефон либо e-mail и кратко описать запрос). Затем, я перезвониваю Вам для согласования времени и даты консультации.</p>
				</div>
			<h4>Стоймость консультации:</h4>
			<table class="d-none d-md-block">
				<tr>
					<td>Очная консультация (Дмитров)</td>
					<td>цена за 1 час (60 мин)</td>
					<td>1500 руб.</td>
				</tr>
				<tr>
					<td>Очная консультация (Москва)</td>
					<td>цена за 1 час (60 мин)</td>
					<td>*2000 руб.</td>
				</tr>
				<tr>
					<td>Заочная консутация по Skype</td>
					<td>цена за 1 час (60 мин)</td>
					<td>1200 руб.</td>
				</tr>
			</table>
			
			<div class="col-auto m-auto d-md-none">
				<div class="wraptable mb-2">
					<p class="mb-0">Очная консультация (Дмитров)</p>
					<div class="d-flex justify-content-around">
						<p class="mx-2 mb-1">цена за 1 час (60 мин)</p>
						<p class="mx-2 mb-1">1500 руб.</p>
					</div>
				</div>
				<div class="wraptable mb-2">
					<p class="mb-0">Очная консультация (Москва)</p>
					<div class="d-flex justify-content-around">
						<p class="mx-2 mb-1">цена за 1 час (60 мин)</p>
						<p class="mx-2 mb-1">2000 руб.</p>
					</div>
				</div>
				<div class="wraptable mb-2">
					<p class="mb-0">Заочная консутация по Skype</p>
					<div class="d-flex justify-content-around">
						<p class="mx-2 mb-1">цена за 1 час (60 мин)</p>
						<p class="mx-2 mb-1">1200 руб.</p>
					</div>
				</div>
			</div>

<!-- 			<table class="m-auto justify-contnet-center">
				<tr>
					<td colspan="2">Очная консультация (Дмитров)</td>
				</tr>
				<tr>
					<td>цена за 1 час (60 мин)</td>
					<td>1500 руб.</td>
				</tr>
				<tr>
					<td colspan="2">Очная консультация (Москва)</td>
				</tr>
				<tr>
					<td>цена за 1 час (60 мин)</td>
					<td>2000 руб.</td>
				</tr>
				<tr>
					<td colspan="2">Заочная консутация по Skype</td>
				</tr>
				<tr>
					<td>цена за 1 час (60 мин)</td>
					<td>1200 руб.</td>
				</tr>
			</table> -->
			</div>
			<div id="how-come-to-me-content" class="col-xl-4 mt-xl-0 col-10 how-come-to-me-content-form mt-5 ">
				<?php Pjax::begin(['timeout'=> 4000]); ?>
				<?php $f = ActiveForm::begin(['options'=>['data-pjax'=>true]]); ?>
					<?php echo '<h3 class="text-center">Записаться на прием</h3>'; ?>
						<div class="d-md-flex d-xl-block justify-content-between">
						<?= $f->field($sendForm,'clientName')->label('Ваше имя')?>
						<?= $f->field($sendForm,'clientSellPhone',['options' => ['class' => 'form-group mx-md-2 mx-xl-0 mx-0']])->label('Ваш телефон') ?>
						<?= $f->field($sendForm,'clientEmail')->label('Ваш Email') ?>
						</div>
						<?= $f->field($sendForm,'clientProblemDescription')->textarea(['rows' => 5])->label('Краткое описание запроса') ?>
						<?= $f->field($sendForm, 'agreetoPersonalData')->checkbox(['uncheck'=>'','label'=>'Даю согласие на передачу персональных данных', 'class'=>'mr-2 align-middle','labelOptions'=>['style'=>'font-size: 0.8rem;', 'class'=>'m-0']])?>
						<?=Html::submitButton(('Отправить'), ['class' => 'sendRequest']); ?>

						<!-- Вывод сообение о доставленном письме -->
						<?php if (Yii::$app->session->hasFlash('success'))
						{ 
							echo Alert::widget([
							    'options' => [
							        'class' => 'alert-success',
							    ],
							    'body' => 'Ваше сообщение отправлено!',
							]);
						}
						elseif(Yii::$app->session->hasFlash('warning') )
						{ 
						echo Alert::widget([
						    'options' => [
						        'class' => 'alert-warning',
						    ],
						    'body' => 'Письмо не ушло, проблема с сервером!',
						]);
						} 
						?>
						<!-- Конец вывода сообение о доставленном письме -->
						
				<?php ActiveForm::end(); ?>
				<?php Pjax::end(); ?>
			</div>
		</div>
	</section>
	<section>
		<div class="row ">
			<div class="col-12 text-center pt-4 place-of-colnsultation-label">
				<p>Место проведения консультаций</p>
			</div>
		</div>
		<div class="row place-of-colnsultation-places no-gutters pb-4">
			<div class="col-md-6 col-12 px-3">
				<p class="text-center my-3">В Дмитрове</p>
				<iframe class="shadow" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa47e38a95b80c8efad4f020503880b5e8992cf351cf5049878a26152452935fd&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
			</div>
			<div class="col-md-6 col-12 px-3">
				<p class="text-center my-3">В Москве</p>
				<iframe class="shadow" src="https://yandex.ru/map-widget/v1/?um=constructor%3A074ac975c36a93a192ec46bfd39ffcaa95e8d0418b7a5a817a65b17cb269b9e5&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
			</div>
		</div>
	</section>
</div>
</main>

