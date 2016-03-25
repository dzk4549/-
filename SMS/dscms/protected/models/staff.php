<?php
class staff extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_staff";
	}

	//登录页面查询员工数据
	public function getLoginMessage($SID){
		// $power = self::model()->find(array(
		// 	'select' => array('Spower'),
		// 	'condition'=>"Sid = '$SID'",
		// 	));

		$sql = 'SELECT Spower FROM storage_staff where Sid='.$SID;
		$power = Yii::app()->db->createCommand($sql)->queryScalar();
		return $power;
	}

	//查询特定员工数据
	public function getStaff($SID){
		$sql = 'SELECT Spower,SWarehouse,SPlace,SName,SAge,SSex,SPhone,SIDnum FROM storage_staff where Sid='.$SID;
		$Staff = Yii::app()->db->createCommand($sql)->queryScalar();
		return $Staff;
	}

	//遍历员工表
	public function getAllStaff(){
		$sql = 'SELECT * FROM storage_staff';
		$AllStaff = Yii::app()->db->createCommand($sql)->queryScalar();
		return $AllStaff;
	}

	//修改员工属性
	public function changeSInformation($SID,$num,$value){
		switch ($num) {
			case 1:
				$Update = self::model()->Update(array('Spower'=>$value),array('Sid'=>'$SID'));
				if($Update->Spower == $value){
					$re = array(
						'error' => array(
							'error_id'=>1,
							)
						);
					echo json_encode($re);
				}else{
					$re = array(
						'error'=>array(
							'error_id'=>2,
							));
					echo json_encode($re);
				}
				break;

			case 2:
				break;

			case 3:
				break;

			case 4:
				break;

			case 5:
				break;

			case 6:
				break;

			case 7:
				break;

			case 8:
				break;
			
			default:
				# code...
				break;
		}
	}

	//删除员工
}
?>