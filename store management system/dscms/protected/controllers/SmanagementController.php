<?php
class SmanagementController extends CController
{
	//登录页面
	public function actionLogin()
	{
	   	// $p = inout::model()->update(array(array('set' => "'InoutTime'='2012-01-23'"),'where'=>"'InoutID'='5'"));
	   	$q = inout::model()->getInoutTime();
	    // var_dump($q);
	    $this->layout= '//layouts/main';
	 	$this->renderpartial("login",array("inout"=>$q));
	} 

	//登出页面，撤销session
	public function actionLogout()
	{

	}
	
	//员工信息管理页面渲染
	public function actionEmployee()
	{

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

	//仓库管理页面渲染
	public function actionWarehouse()
	{

	}

	//添加仓库
	public function actionWAdd()
	{

	}

	//修改仓库设置
	public function actionWChange()
	{

	}

	//删除仓库信息
	public function actionWDelete()
	{

	}

	//货物管理页面渲染
	public function actionGoods()
	{

	}

	//获取货物信息
	public function actionGetGoods()
	{

	}

	//修改货物信息
	public function actionGChange()
	{

	}

	//删除货物信息
	public function actionGDelete()
	{

	}

	//货物进出明细页面
	public function actionGoodsinout()
	{

	}

	public function actionPurchase()
	{

	}

	public function actionInout()
	{

	}
}


?>