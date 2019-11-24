<?php
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;


?>

<p>Данная страница создана для тестирования различных примочек и возможностей</p>
<code class="php">
	<?php Pjax::begin(); ?>
    <?= Html::a(
        'Обновить',
        ['/base/test'],
        ['class' => 'btn btn-lg btn-primary']
    ) ?>
    <p>Время сервера: <?= date("H:i:s"); ?></p>
<?php Pjax::end(); ?>
</code>