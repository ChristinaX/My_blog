<h1>Зарегистрированные пользователи</h1>

<?php foreach($users as $user): ?>
<p>Логин: <?php echo $user->login; ?>, 
E-mail: <?php echo $user->email; ?>, 
Дата регистрации: <?php echo date('d.m.Y H:i', $user->dtime_registration); ?></p>
<?php endforeach; ?>

<a href="<?=Yii::$app->urlManager->createUrl(["user/signup"])?>">Зарегистрироваться</a>