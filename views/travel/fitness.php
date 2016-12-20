<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;
AppAsset::register($this);
require "page.php"
?>
<div class ="container">
<div class="col-lg-2">
</div>
<div class="col-lg-8 text116">
<p>"Зачем вы занимаетесь фитнесом?" - хочется спросить клиентов фитнесс-клубов. Лично я не пытаюсь похудеть, ем все, что хочу; не пытаюсь набрать мышечную массу; не пытаюсь околачиваться возле накачанных мужиков. Просто занимаюсь для души</p>
<?php if (!empty($fitness)): ?>
<?php foreach ($fitness as $fitness): ?>
    <div><a href="<?= yii\helpers\Url::to(['travel/viewfit','id' => $fitness->id])?>" class = "text115"><?= $fitness->title ?></a></div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<div class="col-lg-2">
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>