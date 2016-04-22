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
	public function AddWarehouse($WName,$WLeader,$WAddress,$WRemark){
		$Add = new warehouse;
		$Add->WName = $WName;
		$Add->WLeader = $WLeader;
		$Add->WAddress = $WAddress;
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
	public function UpdateWarehouse($WID,$WName,$WLeader,$WAddress,$WRemark){
		$sql = 'UPDATE storage_warehouse SET WName = ' . $WName . ' , WLeader =' . $WLeader . ' ,  WAddress =\'' . $WAddress . '\'  , WRemark = \''. $WRemark . '\' WHERE Sid = ' . $WID;
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

	//根据员工号查询仓库
	public function getWarehouseBySid($Sid){
		$sql = 'SELECT * FROM storage_warehouse where WLeader='.$Sid;
		$Warehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $Warehouse;
	}

	//查询仓库信息
	public function getWarehouse($Wid = 0){
		$sql = $Wid == 0 ? 'SELECT * FROM storage_warehouse' : 'SELECT * FROM storage_warehouse WHERE Wid = '. $Wid;
		$warehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $warehouse;
	}
}
?>