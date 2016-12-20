<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $pk_user
 * @property integer $dtime_registration
 * @property string $login
 * @property string $password
 * @property string $email
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $password_repeat;
    
    const SCENARIO_SIGNUP = 'signup';
    

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dtime_registration', 'login', 'password', 'email'], 'required'],
            [['dtime_registration'], 'integer'],
            [['login'], 'string', 'min'=>5, 'max' => 30],
	    [['login'], 'match','pattern'=>'/^[A-z][\w]+$/'],
            [['password'], 'string', 'min' => 6, 'max' => 32],
	    [['password_repeat'],'required'],
	    [['password_repeat'], 'string', 'min' => 6, 'max' => 32],
            [['email'], 'string','min'=>6, 'max' => 50],
            [['login'], 'unique'],
            [['email'], 'unique'],
	    [['password'], 'compare', 'compareAttribute'=>'password_repeat', 'on'=>self::SCENARIO_SIGNUP],
            // Почта проверяется на соответствие типу
            [['email'], 'email', 'on'=>self::SCENARIO_SIGNUP],
            // Почта должна быть написана в нижнем регистре
            [['email'], 'filter', 'filter'=>'mb_strtolower'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_user' => 'Pk User',
            'dtime_registration' => 'Dtime Registration',
            'login' => 'Login',
            'password' => 'Password',
	    'password_repeat' => 'Повторите пароль',
            'email' => 'Email',
        ];
    }

    public function beforeSave($insert)
    {
         if(parent::beforeSave())
         {
            if($this->isNewRecord)
            {
                // Время регистрации
                $this->dtime_registration = time();
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
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->pk_user;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    
    public function authenticate() {
	       $user = User::findOne(['login' => $this->login]);
	    
	if (!empty($user)) {
	    

	
	    $hashedPassword = md5($this->password);
	    if ($hashedPassword == $user->password) {
#		die("you are logged in");
		$id = $user->getId();
		return Yii::$app->user->login($user,$duration=0);
#		return Yii::$app->user->id;
	}
	    else {$this->addError($hashedPassword,'Неверный пароль'); }
	
	}
        else {$this->addError($user,'Неверный логин'); }
	
	
}
}