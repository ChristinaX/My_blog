<?php
namespace app\models;
use Yii;
#use yii\base\Model;
use yii\db\ActiveRecord;

class Register extends ActiveRecord
{
    // Сценарий регистрации
    const SCENARIO_SIGNUP = 'signup';

    // Повторный пароль нужно объявить, т.к. этого поля нет в БД
    public $password2;

#    public static function model($className = __CLASS__)
#    {
#        return parent::model($className);
#    }

    public static function tableName()
    {
        return 'register';
    }

    // Правила проверки входящих данных
    public function rules()
    {
        return [
            // Логин и пароль - обязательные поля
            [['username', 'password'], 'required'],
            // Длина логина должна быть в пределах от 5 до 30 символов
            [['username'], 'string', 'min'=>5, 'max'=>30],
            // Логин должен соответствовать шаблону
            [['username'], 'match', 'pattern'=>'/^[A-z][\w]+$/'],
	    // Логин должен быть уникальным
            [['username'], 'unique'],
            // Длина пароля не менее 6 символов
            [['password'], 'string', 'min'=>6, 'max'=>30],
            // Повторный пароль и почта обязательны для сценария регистрации
            [['password2'], 'required', 'on'=>self::SCENARIO_SIGNUP],
            // Длина повторного пароля не менее 6 символов
            [['password2'], 'string', 'min'=>6, 'max'=>30],
            // Пароль должен совпадать с повторным паролем для сценария регистрации
            [['password'], 'compare', 'compareAttribute'=>'password_repeat', 'on'=>self::SCENARIO_SIGNUP],
            // Почта проверяется на соответствие типу
            
        ];
    }
    
    // Метки атрибутов
    public function attributeLabels()
    {
        return array(
            'username' => 'Логин',
            'password' => 'Пароль',
            'password2' => 'Повторите пароль',
            
        );
    }
    
    // Метод, который будет вызываться до сохранения данных в БД
    public function beforeSave($insert)
	{
         if(parent::beforeSave($insert))
         {
            if($this->isNewRecord)
            {
                // Время регистрации
                
                // Хешировать пароль
                $this->password = $this->hashPassword($this->password);
            }

            return true;
         }

        return false;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }
}