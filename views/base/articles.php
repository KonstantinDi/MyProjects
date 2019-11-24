<?php
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;
use yii\helpers\StringHelper;
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

				<div class="text-rigth col offset-lg-1 px-3 px-sm-5 px-md-3 px-lg-3 mb-2">
					<h3>Статьи</h3>
				</div>
			</div>
			<div class="row mb-5">
				<div class="col-12 offset-sm-1 col-sm-10 offset-md-0 col-md-8 offset-lg-1 col-lg-7">
				<!-- Вывод статей -->
				<?php foreach($posts as $post): ?>
					<div class="text-center article shadow mb-5 bg-white rounded">
						<a href="<?= Url::toRoute(['base/article', 'id' => $post->id]) ?>">
							<img class="rounded-top" src="<?= $post->getImage(); ?>" alt="<?= $post->title; ?>">
						</a>
						<div class="article-contain p-4">
							<?php 
							// Если нет такой категории статиь в базе данных выводит разный html.
								if($post->getCategoryforArticle() == null)
								{
									echo '<p>Без категории</p>';
								}
								else
								{
									echo '<a href="'.Url::toRoute(['base/category','id'=>$post->article_category]).'">'.
									$post->getCategoryforArticle().'</a>';
								}
							?>

							<h2><?= $post->title; ?></h2>
							<div class="text-left">
								<?= StringHelper::truncate($post->content, 500); ?>	
							</div>
							<div class="mt-3 d-flex justify-content-between">
								<a href="<?= Url::toRoute(['base/article', 'id' => $post->id]) ?>">
									<button type="button" class="btn btn-outline-primary">Читать далее</button>
								</a>
								
								<div class="d-flex align-items-center">
									<i class="fa fa-eye pr-2" aria-hidden="true"></i>
									<span><?= $post->views;?></span>
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