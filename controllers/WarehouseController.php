<?php
class WarehouseController extends CController
{
	//仓库管理页面渲染
	public function actionWarehouse()
	{
		$this->layout = false;
		$this->render("warehouse");
	}

	//查询仓库信息
	public function actionGetWarehouse()
	{
		//接收传来的参数‘kind’判断进行遍历or根据仓库ID查询某条信息
		if(isset($_POST['kind'])&&Yii::app()->session['SID']){
			$Kind = $_POST['kind'];
			if($Kind == 0){
				$q = warehouse::model()->getWarehouse();
				$this->render("$q");
			}else if($Kind == 1){
				$Wid = $_POST['Wid'];
				$WName = $_POST['WName'];
				$WInf = warehouse::model()->getWarehouseInf($Wid);
				$goods = warehouse::model()->getWarehouse($WName);
				$this->render("warehouse",array("WInf"=>$WInf,"goods"=>$goods));
			}else{
				$re = array(
					'error' => array(
						'error_id'=>3,//参数错误
						));
				echo json_encode($re);
			}
		}
	}

	//添加仓库
	public function actionWAdd()
	{
		if(isset($_POST['$WName'],$_POST['$WLeader'],$_POST['$WAddress'],$_POST['$WRemarks'])||Yii::app()->session['SID']){
			$AddWarehouse = warehouse::model()->AddWarehouse($WName,$WLeader,$WAddress,$WRemarks);
			$this->render(Yii::app->session['Power']);
			if($AddWarehouse == true){
				$re = array(
					$UpdateLog = Log::model()->AddLog(Yii::app()->session['SID'],51);
					'error'=>array(
						'error_id'=>0,//增加仓库成功
						));
				echo json_encode($re);
			}else{
				$re = array(
					'error'=>array(
						'error_id'=>1,//增加仓库失败
						));
				echo json_encode($re);
			}
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>2,//参数错误
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
			$this->render(Yii::app->session['Power']);
			if($update == true){
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
		if(isset($Wid)&&Yii::app()->session['SID']){
			$this->render(Yii::app->session['Power']);
			$q = warehouse::model()->DeleteWarehouse($Wid);
			if($q == false){
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
}
?>