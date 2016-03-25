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
		$AddStaff = staff::model()->AddStaff(3,1,1,'dzk',12,'man','15666666666','136666666666666666');
		if($AddStaff){
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

	//查找员工信息
	public function actionEFind()
	{
		if(Yii::app()->session['var']){
			//$
		}$q = staff::model()->getAllStaff();
	}

	//员工信息修改
	public function actionEChange()
	{
		$q = staff::model()->changeSInformation(2,3,3,4,'qwe',23,'nv','12321321312','123213123123123123');
	}

	//员工信息删除
	public function actionEDelete()
	{
		$q = staff::model()->DeleteStaff(11);
	}
}
?>