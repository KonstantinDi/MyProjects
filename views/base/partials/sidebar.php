
<?php 
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<div class="col-12 offset-sm-1 col-sm-10 offset-md-0 col-md-4 col-lg-3 text-center">

	<div class="popular-articles px-4 py-4 mb-5 bg-white rounded shadow">
		<p>ПОПУЛЯРНЫЕ СТАТЬИ</p>
		<div class="popular-article-contain">

			<?php foreach($popular as $popularpost): ?>
				
				<div class="popular-articles-article mb-4">
					<img src="<?= $popularpost->getImage();?>" alt="<?= $popularpost->title; ?>">
					<a href="<?= Url::toRoute(['base/article','id' => $popularpost->id])?>">
						<h3><?= $popularpost->title; ?></h3>
					</a>
					<p><?= StringHelper::truncate($popularpost->prearticle, 50); ?></p>
				</div>	


			<?php endforeach; ?>
		</div>
	</div>

	<div class="category-articles px-4  py-4 bg-white rounded shadow">
		<p>КАТЕГОРИИ СТАТЕЙ</p>
		<ul class="p-0 px-sm-5 px-md-0 px-lg-3 px-xl-4">
			<?php foreach($categories as $category):?>
				<li class="d-flex justify-content-between">
					<a href="<?= Url::toRoute(['base/category', 'id' => $category->id]) ?>">
						<?= $category->title; ?>	
					</a>
					<span>(<?= $category->getArticlesCount(); ?>)</span>
				</li>
			<?php endforeach;?>
		</ul>
	</div>

</div>