<?php
class power extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_power";
	}

	//返回权限密码
	public function getPassword($Power){
		$Power = (int)$Power;
		 $sql = 'SELECT password FROM storage_power WHERE id = '.$Power;
		 $password = Yii::app()->db->createCommand($sql)->queryScalar();
		return $password;
	}
}
?>