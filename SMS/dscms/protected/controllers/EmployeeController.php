<?php
class EmployeeController extends CController
{
		//员工信息管理页面渲染
	public function actionEmployee()
	{
		$this->layout = false;
		$this->render("Employee");
	}

	//查找员工信息
	public function actionEFind()
	{
		if(Yii::app()->session['var']){
			$
		}
	}

	//增加员工信息
	public function actionEAdd()
	{

	}

	//员工信息修改
	public function actionEChange()
	{

	}

	//员工信息删除
	public function actionEDelete()
	{

	}
}
?>