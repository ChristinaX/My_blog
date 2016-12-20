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
use app\models\User;
use app\models\Posts;
use yii\web\Session;

class UserController extends Controller
{
    // Действие по умолчанию. Выведем список пользователей.
    public function actionIndex()
    {
        // Получить список всех зарегестрированных пользователей...
        $users = User::find()->all();

        // ...и вывести их
        return $this->render('users_list', array('users'=>$users));
    }

    // Действие регистрации
    public function actionSignup()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        $user = new User();

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

                // Перенаправить на список зарегестрированных пользователей
                return $this->render('registerOK');
            }
        }

        // Вывести форму
        return $this->render('form_signup', array('form'=>$user));
    }
} 