<?php
class WarehouseController extends CController
{
	//仓库管理页面渲染
	public function actionWarehouse()
	{
		$this->render("warehouse");
	}

	//添加仓库
	public function actionWAdd()
	{
		if(isset($_POST['WName'],$_POST['WLeader'],$_POST['WAddress'],$_POST['WRemarks'])||Yii::app()->session['SID']){
			$AddWarehouse = warehouse::model()->AddWarehouse($_POST['WName'],$_POST['WLeader'],$_POST['WAddress'],$_POST['WRemarks']);
			$lid = Yii::app()->db->getLastInsertID();
			if($AddWarehouse == true){
				$re = array(
					'error'=>array(
						'error_id'=>0,
						),
					'warehouse_id'=>$lid
				);
				echo json_encode($re);
			}else{
				$re = array(
					'error'=>array(
						'error_id'=>1,
						));
				echo json_encode($re);
			}
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>2,
					));
			echo json_encode($re);
		}
	}

	//修改仓库设置
	public function actionWChange()
	{
		if(isset($_POST['Wid'],$_POST['WName'],$_POST['WLeader'],$_POST['WAddress'],$_POST['WRemarks'])||Yii::app()->session['SID']){
			$Wid = $_POST['Wid'];
			$WName = $_POST['WName'];
			$WLeader = $_POST['WLeader'];
			$WAddress = $_POST['WAddress'];
			$WRemarks = $_POST['WRemarks'];
			$update = warehouse::model()->UpdateWarehouse($Wid,$WName,$WLeader,$WAddress,$WRemarks);
			if($update){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['SID'],51);
				$re = array(
					'error'=>array(
						'error_id'=>0,//修改成功
						));
				echo json_encode($re);
			}else{
				$re = array(
					'error'=>array(
						'error_id'=>1,//修改失败
						));
				echo json_encode($re);
			}
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>2,//没有收到参数或者session中没有值
					));
			echo json_encode($re);
		}
	}

	//删除仓库信息
	public function actionWDelete()
	{
		if(isset($_POST['Wid'])&&Yii::app()->session['SID']){
			$q = warehouse::model()->DeleteWarehouse($_POST['Wid']);
			if(!$q){
				$re = array(
					'error'=>array(
						'error_id'=>1,//删除失败
						));
				echo json_encode($re);
			}else{
				$DeleteLog = Log::model()->AddLog(Yii::app()->session['SID'],61);//61代表删除仓库操作
				$re = array(
					'error'=>array(
						'error_id'=>0,//删除成功
						));
				echo json_encode($re);
			}
		}
	}

	//由员工号查询仓库信息
	public function getWarehouseBySid($SID){
		$sql = 'SELECT * FROM storage_warehouse WHERE Wleader = ' . $SID;
		$Warehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $Warehouse;
	}

	//查询仓库信息
	public function getWarehouse($WID = 0){
		$sql = $WID == 0 ? 'SELECT * FROM storage_warehouse' : 'SELECT * FROM storage_warehouse WHERE Wid = '. $WID;
		$Warehouse = Yii::app()->db->createCommand($sql)->queryAll();
		return $Warehouse;
	}
}
?>