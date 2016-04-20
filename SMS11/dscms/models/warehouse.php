<?php
class warehouse extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_warehouse";
	}

	//增加仓库信息
	public function AddWarehouse($WName,$WLeader,$WAddress,$WPhone,$WRemark){
		$Add = new warehouse;
		$Add->WName = $WName;
		$Add->WLeader = $WLeader;
		$Add->WAddress = $WAddress;
		$Add->WPhone = $WPhone;
		$Add->WRemark = $WRemark;
		$Add->save();
	}

	//删除仓库信息
	public function DeleteWarehouse($WID){
		$sql = 'DELETE from storage_warehouse where Wid ='.$WID;
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

	//修改仓库信息
	public function UpdateWarehouse($WID,$WName,$WLeader,$WAddress,$WPhone,$WRemark){
		$sql = 'UPDATE storage_warehouse SET WName = ' . $WName . ' , WLeader =' . $WLeader . ' ,  WAddress =\'' . $WAddress . '\' ,  WPhone =\'' . $WPhone . '\' , WRemark = \''. $WRemark . '\' WHERE Sid = ' . $WID;
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

	//查询管理员

	//查询仓库备注
	public function getWRemark($WName){
		$sql = 'SELECT WRemark FROM storage_warehouse where WName='.$WName;
		$WDescribe = Yii::app()->db->createCommand($sql)->queryAll();
		return $WDescribe;
	}

	//查询特定仓库
	public function getWarehouse($WID = 0){
		$sql = $WID == 0 ? 'SELECT * FROM storage_warehouse' : 'SELECT * FROM storage_warehouse where Wid='.$WID;
		$Warehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $Warehouse;
	}

	/*//查询所有仓库
	public function getAllWarehouse(){
		$sql = 'SELECT * FROM storage_warehouse';
		$AllWarehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $AllWarehouse;
	}*/
}
?>