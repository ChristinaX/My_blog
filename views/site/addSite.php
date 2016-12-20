<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = "Видеоотзывы";
    $this->registerMetaTag([
	'name' => 'description',
	'content' => 'Видеоотзывы'
    ]);
    $this->registerMetaTag([
	'name' => 'keywords',
	'content' => 'Курсы'
    ]);

?>
<?= Html::submitButton('Добавить сайт',['class' => 'bg_center'])?>
	