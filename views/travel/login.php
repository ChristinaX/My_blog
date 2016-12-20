<?php
use yii\helpers\Html;
# use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
?>
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
<div class = "chris-login">
</div>
<div class = "chris-form">
<div class = "form">
<?php $form = ActiveForm::begin([ 'id' => 'login-form']); ?>

    <?= $form->field($model, 'login') ?>

    <?= $form->field($model, 'password')->input('password');  ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
    <div class ="row">
	<a href="<?=Yii::$app->urlManager->createUrl(["travel/register"])?>" style = "font-size: 18px;">Зарегистрироваться</a>
    </div>
<?php ActiveForm::end(); ?>
</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>