<?php
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
?>

<main>
	<div class="container-fluid container-articles">
<?php 
//хлебные крошки
echo Breadcrumbs::widget([
    'options' => [
        'class' => 'breadCrumbs breadCrumbsArticles py-3 px-3 px-sm-5 px-md-2 px-lg-5 m-0',
                    ],
    'homeLink' => [ 
        'label' => Yii::t('yii', 'Главная'), 
        'url' => Yii::$app->homeUrl, 
       ], 
    'itemTemplate' => "<li>{link}<i class=\"fas fa-chevron-right px-2\"></i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Статьи',
            'url' => ['base/articles'],
            'template' => "<li>{link}</li>\n", // template for this link only
        ],
    ],
]);
// end breadcrambs
?>

		<div class="pagecontainer">
			<div class="row">
				<div class="col-12 offset-sm-1 col-sm-10 offset-md-0 col-md-8 col-lg-9 offset-xl-1 col-xl-7 mb-2">
					<h3>Статьи из категории: <?= $thisCategory->title;?></h3>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-12 offset-sm-1 col-sm-10 offset-md-0 col-md-8 col-lg-9 offset-xl-1 col-xl-7">
				<!-- Вывод статей по категории-->
					<?php foreach ($articles as $article): ?>
						<div class="d-flex flex-column flex-lg-row flex-lg-row shadow mb-5 bg-white mx-3 rounded mx-sm-0 overflow-hidden">
							<div class="img-cat-article col-12 col-lg-6 p-0 article" style="background: url(<?= $article->getImage(); ?>); background-size: cover;">
							</div>
							<div class='d-flex flex-column justify-content-between col-12 col-lg-6 p-3 pl-4'>
								<h3><?= $article->title?></h3>
								<p><?= $article->prearticle?></p>
								<div class="d-flex justify-content-between mt-3">
									<a href="<?= Url::toRoute(['base/article', 'id' => $article->id]) ?>">
										<button type="button" class="btn btn-outline-primary">Читать далее</button>
									</a>
									
									<div class="d-flex align-items-center">
										<i class="fa fa-eye pr-2" aria-hidden="true"></i>
										<span><?= $article->views;?></span>
									</div>
								</div>
							</div>
						</div>	
					<?php endforeach; ?>	
					<!-- Пагинация -->
					<?php echo LinkPager::widget([
						'pagination' => $pages, 
						'options'=>
							['class'=>
								['pagination justify-content-center mb-5']
							]
						]); 
					?>
				</div>
<!-- partials/Sidebar.php -->
				<?=
					$this->render('partials/sidebar',[
						'categories'=>$categories,
						'popular'=>$popular
					])
				?>
			</div>
		</div>
	</div>
</main>