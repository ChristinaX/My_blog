<?php

namespace app\models;

use Yii;
#use yii\base\Model;
#use yii\db\ActiveRecord;
#use yii\base\Security;
#use yii\captcha\Captcha;



/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord implements
\yii\web\IdentityInterface
{
    public $user=false;
    public $login;
    public $password;
    public $rememberMe = true;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['rememberMe', 'boolean'],
	    [['login','password'], 'validateUP'],
	    
	    
        ];
    }
    public function validateUP($attribute,$params) {
    
	if (!$this->hasErrors()) {
	    
	     if (!$this->getUser()) {
	     
		$this->addError($attribute,'Неверный логин/пароль');
	    
    
	}
    }
}
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Username',
            'password' => 'Password',
	        ];
    }
    public static function findIdentity($id) {
	    return static::findOne($id);
	
    }
    public function getId()
    {
        return $this->id;
    }
    
    public static function 
    findIdentityByAccessToken($token, $type = null)
    {
      
    }
    
    public function getAuthKey()
    {
       
    }
 
    public function validateAuthKey($authKey)
    {
      
    }
    public function login() {
	if ($this->validate()) {
	    return Yii::$app->user->login($this->getUser(),$this->rememberMe ? 3600  : 0);
	    
	    	}
    }
    public function getUser() {
	if ($this->user === false) {
	    $this->user = Users::findOne(['login' => $this->login,
					  'password' => $this->password]);
	}
	return $this->user;
    }



}
