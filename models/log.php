<?php
class Log extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_log";
	}
	//接收传过来的员工ID和操作代码，存入登录操作表
	public function AddLog($SID,$State){
		$Log = new Log;
		$Log->Sid = $SID;
		$Log->Lstate = $State;
		$Log->Ltime = date('Y-m-d H:i:s');
		$Log->save();

		return $Log;
	}

	//获取登录操作表
	public function getLog(){
		$sql = 'SELECT * FROM storage_log';
		$getLog = Yii::app()->db->createCommand($sql)->queryAll();
		return  $getLog;
	}
}
?>