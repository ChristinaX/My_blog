<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$action = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> </title>
    <?php $this->head() ?>
    <link href="/web/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
</head>
<body>
<?php $this->beginBody() ?>
<div id="bg">
    <div id="container">
	<div id="header">
	    <img src="images/header.png" alt="Шапка сайта"/>
	</div>
	<div id="topmenu">
	    <ul>
			<li>
		<a href="<?=Yii::$app->urlManager->createUrl(["site/index"])?>" <?php if ($action=="index") { ?>class="active"<?php } ?>>
		<img src="images/home.png" alt="Главная"/> </a>
			</li>
			<li>
		<a href="<?=Yii::$app->urlManager->createUrl(["site/author"])?>"<?php if ($action=="author") { ?>class="active"<?php } ?>>
		Об авторе  </a>
			</li>
			<li>
		<a href="<?=Yii::$app->urlManager->createUrl(["site/video"])?>"<?php if ($action=="video") { ?>class="active"<?php } ?>>
		Видеокурсы  </a>
			</li>
			<li>
		<a href="<?=Yii::$app->urlManager->createUrl(["site/rev"])?>"<?php if ($action=="rev") { ?>class="active"<?php } ?>>
		Видеоотзывы </a>
			</li>
			<li>
		<a href="<?=Yii::$app->urlManager->createUrl(["site/sites"])?>"<?php if ($action=="sites") { ?>class="active"<?php } ?>>
		Сайты учеников </a>
			</li>
	    </ul>
	<div id="form_search">
	    <form name="search" action="http://blog.myrusakov.ru/functions.php" method="post">
		<table>
		    <tr>
			<td>
			    <input type="text" name="q" class="input" />
			</td>
			<td>
			    <input type="hidden" name="func" value="search" />
			    <input type="image" src="images/button_search.png" class="icon_button" alt="Картинки">
			</td>
		    </tr>
		</table>
	    </form>
	</div>
	<div class="clear"></div>
	</div>
	<div>
	    <table id="content">
    </div>
</div>
</body>
</html>