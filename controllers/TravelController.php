<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\MyForm;
use app\models\Comments;
use yii\data\Pagination;
use app\models\Users;
use app\models\User;
use app\models\Register;
use app\models\Posts;
use app\models\Swimming;
use app\models\Music;
use app\models\Running;
use app\models\Fitness;
use yii\web\Session;

class TravelController extends Controller
{

    

    public function my_user() {
	$id = Yii::$app->user->id;
       $username = User::find()->where(['pk_user' => $id])->one();
       $name = $username->login;
	return $name;
    }

     public function actionIndex() {
	$posts = Posts::find()->select('id,title,content')->all();
#<----->$this->debug($posts);
#<----->debug($posts);
	$query = Posts::find()->select('id,title,content')->orderBy('id DESC');
	$pages = new \yii\data\Pagination(['totalCount' => $query->count(),'pageSize' =>4,'pageSizeParam' => false, 'forcePageParam' => false]);
	$posts = $query->offset($pages->offset)->limit($pages->limit)->all();
	return $this->render('main',compact('posts','pages'));

    }
     public function actionLogin() {
#	$model = new User();
	
	$query = Posts::find()->select('id,name,title,content')->orderBy('id DESC');
	$pages = new \yii\data\Pagination(['totalCount' => $query->count(),'pageSize' =>4,'pageSizeParam' => false, 'forcePageParam' =>false]);
	$posts = $query->offset($pages->offset)->limit($pages->limit)->all();
	$music = Music::find()->all();
	if (!\Yii::$app->user->isGuest) {
#	    $id = Yii::$app->user->id;
#	    $username = User::find()->where(['pk_user' => $id])->one();
#	    $name = $username->login;
	    return $this->render('main',['name'=>self::my_user(),'posts'=>$posts,'music'=>$music]);
#	     return $this->render('test',['username'=>$username]);
	    
#	    return $this->redirect('195.239.220.38/travel/login');
	}
    	
#	if ($model->load(Yii::$app->request->post()) 
#            && $model->login()) {
	$model = new User();
	if ($model->load(Yii::$app->request->post()) && $model->authenticate()) {
#	    $query = Posts::find()->select('id,name,title,content')->orderBy('id DESC');
#	    $pages = new \yii\data\Pagination(['totalCount' => $query->count(),'pageSize' =>4,'pageSizeParam' => false, 'forcePageParam' => false]);
#	    $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
#	    $username = $model->login;
	    $name = $model->login;
	    
	    return $this->render('main',array('name'=>$name,'posts'=>$posts,'music'=>$music));
#	    return $this->redirect('test');
	}
#	return $this->refresh();
	return $this->render('login',['model'=>$model]);
#	return $this->redirect('login');
#	return $this->redirect(array(travel/test));

    }
    
    public function actionLogout() {
	
	Yii::$app->user->logout();
	
	return $this->render('logout');
	
    }

     public function actionView() {
	if (Yii::$app->user->id) {
	$id = Yii::$app->request->get('id');
	$post = Posts::findOne($id);
	if (empty($post)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	return $this->render('view',['post'=>$post,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}
    public function actionRegister()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        $user = new User(User::SCENARIO_SIGNUP);

        // Если пришли данные для сохранения
        if(isset($_POST['User']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['User'];

            // Проверка данных
            if($user->validate())
            {
                // Сохранить полученные данные
                // false нужен для того, чтобы не производить повторную проверку
                $user->save(false);

                
		$model = "Вы зарегистрированы!!";
                return $this->render('registerOK', ['model'=>$model]);
            }
        }

        // Вывести форму
        return $this->render('register', ['model'=>$user]);
    }

    function actions() {
	return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
		 'backColor'=>0xEBF4FB,
            ],
        ];	
}
    public function actionTest() {
#	$id = Yii::$app->user->id;
#	$username = User::find()->where(['pk_user' => '2'])->all();
        
        return $this->render('test');
    }

    public function actionRunning() {
	if (Yii::$app->user->id) {
	    $running = Running::find()->select('id,title')->all();
	    if (empty($running)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	    return $this->render('running',['running'=>$running,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}
    public function actionViewrun() {
	if (Yii::$app->user->id) {
	    $id = Yii::$app->request->get('id');
	    $post = Running::findOne($id);
	    if (empty($post)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	    return $this->render('viewrun',['post'=>$post,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}

    public function actionSwimming() {
	if (Yii::$app->user->id) {
	    $swimming = Swimming::find()->select('id,title')->all();
	    if (empty($swimming)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	    return $this->render('swimming',['swimming'=>$swimming,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}

    public function actionViewswim() {
	if (Yii::$app->user->id) {
	    $id = Yii::$app->request->get('id');
	    $post = Swimming::findOne($id);
	    if (empty($post)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	    return $this->render('viewswim',['post'=>$post,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}

    public function actionFitness() {
	if (Yii::$app->user->id) {
	    $fitness = Fitness::find()->select('id,title')->all();
	    if (empty($fitness)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
	    return $this->render('fitness',['fitness'=>$fitness,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}

    public function actionViewfit() {
	if (Yii::$app->user->id) {
    	    $id = Yii::$app->request->get('id');
    	    $post = Fitness::findOne($id);
    	    if (empty($post)) throw new \yii\web\HttpException(404,'Такой страницы не существует');
    	    return $this->render('viewfit',['post'=>$post,'name'=>self::my_user()]);}
	else  {throw new \yii\web\UnauthorizedHttpException('Вы неавторизованны!!!');}

}
    public function init() { $this->layout = false; }
}
?>