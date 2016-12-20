<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;

class AppController extends Controller {

#    public function actionIndex($name='guest') {
#	$home = 'Hello, world!!!!';
#	return $this->render('index', compact('home','name'));
#    }
    
#    public function actionTest() {
#	$var = 'I try to study YII2';
#	return $this->render('test', compact('var'));
#    }
    public function debug($arr) {
	echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}



?>