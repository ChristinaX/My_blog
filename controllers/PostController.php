<?php
namespace app\controllers;
use app\models\Post;

class PostController extends AppController {

    public function actionIndex() {
	$posts = Post::find()->select('id,title,excerpt')->all();
#	$this->debug($posts);
#	debug($posts);
	$query = Post::find()->select('id,title,excerpt')->orderBy('id DESC');
	$pages = new \yii\data\Pagination(['totalCount' => $query->count(),'pageSize' =>4,'pageSizeParam' => false, 'forcePageParam' => false]);
	$posts = $query->offset($pages->offset)->limit($pages->limit)->all();
	return $this->render('index',compact('posts','pages'));
	
    }
    public function actionView() {
	$id = \Yii::$app->request->get('id');
	$post = Post::findOne($id);
	if (empty($post)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	return $this->render('view',compact('post'));
    }

    public function actionTest() {
	return $this->render('test');
    }
    
    public function actionHello() {
	return $this->render('hello');
    }
}