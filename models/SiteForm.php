<?php
    namespace app\models;
    use yii\base\Model;
    class SiteForm extends Model {
	public $username;
	public $password;
	
	public function rules() {
	    return [
		['username','required','message' => 'Введите логин'],
		['password','required','message' => 'Введите пароль'],
		['password','validatePassword']
	    ];
	}
	
	 public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    
    }

?>