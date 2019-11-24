<?php
use yii\widgets\Breadcrumbs;
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
            'label' => $article->title,
            'url' => ['base/article'],
            'template' => "<li>{link}</li>\n", // template for this link only
        ],
    ],
]);
// end breadcrambs
?>
		<div class="pagecontainer">
			<div class="row">

			</div>
			<div class="row mb-5">
				<div class="col-12 offset-sm-1 col-sm-10 offset-md-0 col-md-8 offset-lg-1 col-lg-7">
				<!-- Вывод статьи -->
					<div class="text-center article shadow mb-5 bg-white rounded">
							<img class="rounded-top" src="<?= $article->getImage(); ?>" alt="<?= $article->title; ?>">
						<div class="article-contain p-4">
							<a href="<?= Url::toRoute(['base/category', 'id' => $article->article_category]) ?>">
								<p><?= $article->getCategoryforArticle();?></p>
							</a>
							<h3><?=$article->title?></h3>
							<div class="text-left"><?= $article->content; ?></div>
							<div class="mt-3 d-flex justify-content-between">
								<a href="<?= Url::previous();?>">
									<button type="button" class="btn btn-outline-primary">Вернуться к статьям</button>
								</a>
								<div class="d-flex align-items-center">
									<i class="fa fa-eye pr-2" aria-hidden="true"></i>
									<span><?= $article->views;?></span>
								</div>
							</div>
						</div>
					</div>
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