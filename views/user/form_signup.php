<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<div class="form">
<?php echo Html::beginForm(); ?>

    <?php echo Html::errorSummary($form)?>

    <div class="row">
        <?php echo Html::activeLabel($form,'login')?>*:
        <?php echo Html::activeTextInput($form,'login'); ?>
    </div>

    <div class="row">
        <?php echo Html::activeLabel($form,'password'); ?>*:
        <?php echo Html::activePasswordInput($form,'password'); ?>
    </div>

    <div class="row">
        <?php echo Html::activeLabel($form,'password_repeat'); ?>*:
        <?php echo Html::activePasswordInput($form,'password_repeat'); ?>
    </div>

    <div class="row">
        <?php echo Html::activeLabel($form,'email'); ?>*:
        <?php echo Html::activeTextInput($form,'email') ?>
    </div>

    <div class="row submit">
        <?php echo Html::submitButton('Зарегистрироваться'); ?>
    </div>

<?php echo Html::endForm(); ?>
</div>