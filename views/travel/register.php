<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;
use yii\bootstrap\Button;
AppAsset::register($this);
require "page.php" 
?>
<div class="text111">
<h3>Регистрация</h3>

<div class="form">
<?php echo Html::beginForm(); ?>

    <?php echo Html::errorSummary($model)?>

    <div class="row">
        <?php echo Html::activeLabel($model,'username')?>*:
        <?php echo Html::activeTextInput($model,'username'); ?>
    </div>

    <div class="row">
        <?php echo Html::activeLabel($model,'password'); ?>*:
        <?php echo Html::activePasswordInput($model,'password'); ?>
    </div>

    <div class="row">
        <?php echo Html::activeLabel($model,'password2'); ?>*:
        <?php echo Html::activePasswordInput($model,'password2'); ?>
    </div>
    <div class="row submit">
        <?php echo Html::submitButton('Зарегистрироваться'); ?>
    </div>

<?php echo Html::endForm(); ?>
</div>
</div>