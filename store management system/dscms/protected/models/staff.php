<?php
class staff extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_staff";
	}

	//增加员工信息
	public function AddStaff($Spower,$SWarehouse,$SPlace,$SName,$SAge,$SSex,$SPhone,$SIDnum){
		$Add = new staff;
		$Add->Spower = $Spower;
		$Add->SWarehouse = $SWarehouse;
		$Add->SPlace = $SPlace;
		$Add->SName = $SName;
		$Add->SAge = $SAge;
		$Add->SSex = $SSex;
		$Add->SPhone = $SPhone;
		$Add->SIDnum = $SIDnum;
		$Add->save();
	}

	//修改员工属性
	public function changeSInformation($SID,$Spower,$SWarehouse,$SPlace,$SName,$SAge,$SSex,$SPhone,$SIDnum){
			
				//$Update = self::model()->Update(array('Spower'=>$value),array('Sid'=>'$SID'));
				$sql = 'UPDATE storage_staff SET Spower = ' . $Spower . ' , SWarehouse =' . $SWarehouse . ' ,  SPlace =\'' . $SPlace . '\'  , SName = \''. $SName . '\'  , SAge = \'' . $SAge . '\'  , SSex = \'' . $SSex . '\'  , SPhone = \'' . $SPhone . '\'  , SIDnum = \'' . $SIDnum . '\' WHERE Sid = ' . $SID;
            	$update = Yii::app()->db->createCommand($sql)->query();
            	
            	var_dump($update);
				if($update == true){
					$re = array(
						'error' => array(
							'error_id'=>0,
							)
						);
					echo json_encode($re);
				}else{
					$re = array(
						'error'=>array(
							'error_id'=>1,
							));
					echo json_encode($re);
				}
				
		}
	

	//删除员工
	public function DeleteStaff($SID){
		$sql = 'DELETE from storage_staff where Sid ='.$SID;
		$delete = Yii::app()->db->createCommand($sql)->query();
		if($delete){
			$re = array(
					'error'=>array(
						'error_id'=>0,
						));
				echo json_encode($re);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>1,
					));
				echo json_encode($re);
		}
	}

	//查询员工信息
	public function getStaff($Sid = 0){
		$sql = $Sid == 0 ? 'SELECT * FROM storage_staff' : 'SELECT * FROM storage_staff WHERE Sid = '. $Sid;
		$staff = Yii::app()->db->createCommand($sql)->queryAll();
		return $staff;
	}
}
?>