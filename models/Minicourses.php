<?php
namespase app\models;
use yii\db\ActiveRecord;

class Minicourses extends ActiveRecord
{
    public function afterFind() {
	$this->img = "courses/".$this->img;

}

?>