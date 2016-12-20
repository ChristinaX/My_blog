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
<p>Когда в 8 утра в воскресенье ныряешь в холодную воду бассейна и без остановки, от бортика до бортика, плывешь все 45 минут, так, что к концу вода кажется горячей и все это после недельной подготовки к экзамену - ощущаешь себя заново родившимся, окрыленным, свободным...
</p>
<?php if (!empty($swimming)): ?>
<?php foreach ($swimming as $swim): ?>
    <div><a href="<?= yii\helpers\Url::to(['travel/viewswim','id' => $swim->id])?>" class = "text115"><?= $swim->title ?></a></div>
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