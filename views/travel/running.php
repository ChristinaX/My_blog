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
<p>Если вы не знаете как решить какую-то проблему - оденьте кроссовки и пробегите пару километров - решение придет само. 
Обычно для людей, совершающих пробежки, бег - это способ похудеть или быть в тонусе. Но бег дает гораздо больше, больше с психологической точки зрения. Я не буду комментировать медицинские статьи о беге, просто скажу: бегаете и поймете сами. 
</p>



<?php if (!empty($running)): ?>
<?php foreach ($running as $run): ?>
    <div><a href="<?= yii\helpers\Url::to(['travel/viewrun','id' => $run->id])?>" class = "text115"><?= $run->title ?></a></div>
    


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

