<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Button;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
<div class="row">
  <div class="col-lg-4">
    


    <?php
    
    
    NavBar::begin([
        'brandLabel' => false,
        
        'options' => [
            'class' => 'navbar-custom navbar-fixed-top',
        ],
    ]);
#    foreach($username as $name) { 
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
	    
             
            ['label' => 'Выход' . '(' . $name .')','url'=>['/travel/logout']],
            

 
]
    ]);  
    NavBar::end();
    ?>






<div class="list-group wrap">
<div class="panel panel-default">
  <div class="panel-heading">
<p class="list-group-item list-group-item-danger">Путешествия</p>
    <?php if (!empty($posts)): ?>
<?php foreach ($posts as $post): ?>
<div class="panel-body text114">
    <a href="<?= yii\helpers\Url::to(['travel/view','id' => $post->id])?>" class = "text115"><?= $post->name ?></a>
 
  
    <?= $post->title ?>
  </div>

<?php endforeach; ?>
<?php endif;  ?>
</div></div></div>
</div>

 <div class="col-lg-4">
<div class="list-group wrap">
<div class="panel panel-default">
  <div class="panel-heading">
<p class="list-group-item list-group-item-danger">Музыка</p>


<?php if (!empty($music)): ?>
<?php foreach ($music as $song): ?>
<div class="panel-body text115">
    <?= $song->author ?>
    
<div class="text114">    <?= $song->title ?></div>
</div>
<?php endforeach; ?>
<?php endif;  ?>
</div></div></div>
</div>


 <div class="col-lg-4">
<div class="list-group wrap">
<div class="panel panel-default">
  <div class="panel-heading">
<p class="list-group-item list-group-item-danger">Спорт</p>
<div class="panel-body text114">
    <a href="<?= yii\helpers\Url::to(['travel/running'])?>" class = "text115">Бег</a> Почему бег - это круто?
</div>
<div class="panel-body text114">
    <a href="<?= yii\helpers\Url::to(['travel/swimming'])?>" class = "text115">Плавание</a> Кроме зимнего)))))
</div>
<div class="panel-body text114">
    <a href="<?= yii\helpers\Url::to(['travel/fitness'])?>" class = "text115">Фитнес</a> Это мода или образ жизни?
</div></div></div></div>
</div>
</div></div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
