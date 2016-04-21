<?php
class WarehouseController extends CController
{
	//查询仓库信息
	public function actionGetWarehouse()
	{
		//接收传来的参数‘kind’判断进行遍历or根据仓库ID查询某条信息
		if(isset($_GET['kind'])&&Yii::app()->session['var']){
			$Kind = $_GET['kind'];
			if($Kind == 0){
				$q = warehouse::model()->getAllWarehouse();
				echo json_encode($q);
			}else if($Kind == 1){
				$WID = $_POST['WID'];
				$q = warehouse::model()->getWarehouse($WID);
				echo json_encode($q);
			}else{
				$re = array(
					'error' => array(
						'error_id'=>3,
						));
				echo json_encode($re);
			}
			
		}
	}

	//添加仓库
	public function actionWAdd()
	{
		if(isset($_POST['$WName'],$_POST['$WLeader'],$_POST['$WAddress'],$_POST['$WRemarks'])||Yii::app()->session['var']){
			$AddWarehouse = warehouse::model()->AddWarehouse($WName,$WLeader,$WAddress,$WRemarks);
			if($AddWarehouse == true){
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
		if(isset($_POST['$Wid'],$_POST['$WName'],$_POST['$WLeader'],$_POST['$WAddress'],$_POST['$WRemarks'])||Yii::app()->session['var']){
			$Wid = $_POST['$Wid'];
			$WName = $_POST['$WName'];
			$WLeader = $_POST['$WLeader'];
			$WAddress = $_POST['$WAddress'];
			$WRemarks = $_POST['$WRemarks'];
			$update = warehouse::model()->UpdateWarehouse($Wid,$WName,$WLeader,$WAddress,$WRemarks);
			if($update == true){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['var'],51);
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
		if(isset($Wid)&&Yii::app()->session['var']){
			$q = warehouse::model()->DeleteWarehouse($Wid);
			if($q == false){
				$re = array(
					'error'=>array(
						'error_id'=>1,//删除失败
						));
				echo json_encode($re);
			}else{
				$DeleteLog = Log::model()->AddLog(Yii::app()->session['var'],61);//61代表删除仓库操作
				$re = array(
					'error'=>array(
						'error_id'=>0,//删除成功
						));
				echo json_encode($re);
			}
		}
	}
}
?>