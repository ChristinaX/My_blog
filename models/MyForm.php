<?php
    namespace app\models;
    use Yii;
    use yii\base\Model;

    class MyForm extends Model
    {
	public $name;
	public $email;
	public $file;
	public function rules() {
	    return [
		[['name','email'],'required','message' => 'Имя кто будет указывать?'],
		['email','email', 'message' => 'Что ты пишешь, дебилка?????'],
		[['file'], 'file','extensions' => 'jpg,png']
	    ];
	}
    }
?>