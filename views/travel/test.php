<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Button;
use yii\bootstrap\Alert;
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
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-info'
    ],
    'body' => '<b>Привет</b>, Обратите внимание на эту полезную информацию.'
]);
?>
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-success'
    ],
    'body' => '<b>Вы победили!</b> Поздравляем с вашим новым достижением.'
]);
?>
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-warning'
    ],
    'body' => '<b>Обратите внимание</b> на эту важную информацию.'
]);
?>
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-danger'
    ],
    'body' => '<b>Ошибка!</b> Похоже, что-то сломалось.'
]);
?>
<?php
echo Button::widget([
    'label' => 'Default',
    'options' => [
        'class' => 'btn-lg btn-default',
        'style' => 'margin:5px'
    ], // переопределяем стили bootstrap css своими
    'tagName' => 'div'
]); // по желанию, возможно изменить тег элемента
?>
<?php
echo Button::widget([
    'label' => 'Primary',
    'options' => [
        'class' => 'btn-lg btn-primary',
        'style' => 'margin:5px'
    ]
]);
?> 
<?php
echo Button::widget([
    'label' => 'Ура!',
    'options' => [
        'class' => 'btn-lg btn-success',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Info',
    'options' => [
        'class' => 'btn-lg btn-info',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Warning',
    'options' => [
        'class' => 'btn-lg btn-warning',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Danger',
    'options' => [
        'class' => 'btn-lg btn-danger',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Link',
    'options' => [
        'class' => 'btn-lg btn-link',
        'style' => 'margin:5px'
    ]
]);
?> 
// disabled
<?php
echo Button::widget([
    'label' => 'Default',
    'options' => [
        'class' => 'disabled btn-default',
        'style' => 'margin:5px'
    ], // add a style to overide some default bootstrap css
    'tagName' => 'div'
]); // change the tag used to generate the button if you like
?>
<?php 
echo Button::widget([
    'label' => 'Primary',
    'options' => [
        'class' => 'disabled btn-primary',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Success',
    'options' => [
        'class' => 'disabled btn-success',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Info',
    'options' => [
        'class' => 'disabled btn-info',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Warning',
    'options' => [
        'class' => 'disabled btn-warning',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Danger',
    'options' => [
        'class' => 'disabled btn-danger',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Link',
    'options' => [
        'class' => 'disabled btn-link',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
// mixed size
echo Button::widget([
    'label' => 'Large',
    'options' => [
        'class' => 'btn-lg btn-default',
        'style' => 'margin:5px'
    ], // add a style to overide some default bootstrap css
    'tagName' => 'div'
]); // change the tag used to generate the button if you like
?>
<?php 
echo Button::widget([
    'label' => 'Default',
    'options' => [
        'class' => 'btn-primary',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Small',
    'options' => [
        'class' => 'btn-sm btn-success',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Extra Small',
    'options' => [
        'class' => 'btn-xs btn-info',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Large',
    'options' => [
        'class' => 'btn-lg btn-warning',
        'style' => 'margin:5px'
    ]
]);
?>
<?php 
echo Button::widget([
    'label' => 'Default',
    'options' => [
        'class' => 'btn-danger',
        'style' => 'margin:5px'
    ]
]);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>