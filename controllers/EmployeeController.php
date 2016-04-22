<?php
class EmployeeController extends CController
{
		//员工信息管理页面渲染
	public function actionEmployee()
	{
		$this->layout = false;
		$this->render("Employee");
	}

	//增加员工信息
	public function actionEAdd()
	{
		if(Yii::app()->session['SID']){
			$AddStaff = staff::model()->AddStaff($Spower,$SWarehouse,$SPlace,$SName,$SAge,$SSex,$SPhone,$SIDnum);
			if($AddStaff == true){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['SID'],53);
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

	//查找员工信息
	public function actionEFind()
	{
		//接收传来的参数‘kind’判断进行遍历or根据员工ID查询某条信息
		if(isset($_POST['kind'])&&Yii::app()->session['SID']){
			$Kind = $_POST['kind'];
			if($Kind == 0){
				$Aq = staff::model()->getStaff();
				echo json_encode($q);
			}else if($Kind == 1){
				$SID = $_POST['SID'];
				$q = staff::model()->getStaff($SID);
				echo json_encode($q);
			}else{
				$re = array(
					'error' => array(
						'error_id'=>1,
						));
				echo json_encode($re);
			}
			
		}
	}

	//员工信息修改
	public function actionEChange()
	{
		
		if(Yii::app()->session['SID']){
			$SID = $_POST['SID'];
			$Spower = $_POST['Spower'];
			$SWarehouse = $_POST['SWarehouse'];
			$SPlace = $_POST['SPlace'];
			$SName = $_POST['SName'];
			$SAge = $_POST['SAge'];
			$SSex =$_POST['SSex'];
			$SPhone =$_POST['SPhone'];
			$SIDnum =$_POST['SIDnum'];
			$q = staff::model()->changeSInformation($SID,$Spower,$SWarehouse,$SPlace,$SName,$SAge,$SSex,$SPhone,$SIDnum);
			if($update == true){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['SID'],53);//做记录
				$re = array(
					'error'=>array(
						//成功更新
						'error_id'=>0,
						));
				echo json_encode($re);
			}else{
				$re = array(
					'error'=>array(
						//更新失败
						'error_id'=>1,
						));
				echo json_encode($re);
			}
		}else{
			$re = array(
				'error'=>array(
					//没有收到前端传来的参数
					'error_id'=>2,
					));
			echo json_encode($re);
		}
		
	}

	//员工信息删除
	public function actionEDelete()
	{
		if(isset($Sid)&&Yii::app()->session['SID']){
			$q = staff::model()->DeleteStaff($Gid);
			if($q == false){
				$re = array(
					'error'=>array(
						'error_id'=>1,//删除失败
						));
				echo json_encode($re);
			}else{
				$DeleteLog = Log::model()->AddLog(Yii::app()->session['SID'],63);//63表示删除员工操作
				$re = array(
					'error'=>array(
						'error_id'=>0,//删除成功
						));
				echo json_encode($re);
			}
		}
}
?>