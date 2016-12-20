<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
require "page.php" ?>
<div class ="container">
<div class="col-lg-2">
</div>
<div class="col-lg-8">

<div class="list-group wrap">
<div class="panel panel-default">
  <div class="panel-heading">
<p class="list-group-item list-group-item-danger text-center"><?= $post->title ?></p>
<div class="panel-body">
<div class="text112">    <?= $post->content ?></div>
</div>
</div>
</div></div></div>
<div class="col-lg-2">
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>