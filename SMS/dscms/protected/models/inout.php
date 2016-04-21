<?php
class inout extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "inout";
	}

	//查询数据测试
	public function getInoutTime(){
		
		return "1"; /*self::model()->find(array(
			'select' => array('InoutTime'),
			'condition'=>"InoutID = '5'",
			));*/
		
	}
}
?>