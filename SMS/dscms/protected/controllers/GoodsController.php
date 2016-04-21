<?php
class GoodsController extends CController
{
	//添加货物信息
	public function actionAddGoods()
	{
		if(isset($_POST['$GID'],$_POST['$GName'],$_POST['$GPrice'],$_POST['$GQuantity'],$_POST['$GToplimit'],$_POST['$GLowerlimit'],$_POST['$GWid'])&&Yii::app()->session['var']){
			$AddGoods = goods::model()->AddGoods($Gid,$GName,$GPrice,$GQuantity,$GToplimit,$GLowerlimit,$GWid);
			if($AddGoods == true){
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

	//按ID查找货物信息
	public function actionGetGoods()
	{
		//接收传来的参数‘kind’判断进行遍历or根据货物ID查询某条信息
		if(isset($_GET['kind'])&&Yii::app()->session['var']){
			$Kind = $_GET['kind'];
			if($Kind == 0){
				$q = goods::model()->getAllGoods();
				echo json_encode($q);
			}else if($Kind == 1){
				$SID = $_POST['GID'];
				$q = goods::model()->getGoods($GID);
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

	//修改货物信息
	public function actionUpdateGoods()
	{
		if(isset($_POST['$GID'],$_POST['$GName'],$_POST['$GPrice'],$_POST['$GQuantity'],$_POST['$GToplimit'],$_POST['$GLowerlimit'],$_POST['$GWid'])||Yii::app()->session['var']){
			$Gid = $_POST['$GID'];
			$GName = $_POST['$GName'];
			$GPrice = $_POST['$GPrice'];
			$GQuantity = $_POST['$GQuantity'];
			$GToplimit = $_POST['$GToplimit'];
			$GLowerlimit = $_POST['$GLowerlimit'];
			$GWid =$_POST['$GWid'];
			$update = goods::model()->UpdateGoods($Gid,$GName,$GPrice,$GQuantity,$GToplimit,$GLowerlimit,$GWid);
			if($update == true){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['var'],52);
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

	//删除货物信息
	public function actionDeleteGoods()
	{
		if(isset($Gid)&&Yii::app()->session['var']){
			$q = goods::model()->DeleteGoods($Gid);
			if($q == false){
				$re = array(
					'error'=>array(
						'error_id'=>1,//删除失败
						));
				echo json_encode($re);
			}else{
				$DeleteLog = Log::model()->AddLog(Yii::app()->session['var'],62);//62代表删除货物操作
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