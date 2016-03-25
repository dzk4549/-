<?php
class GoodsController extends CController
{
	//货物管理页面渲染
	public function actionGoods()
	{
		$this->layout = false;
		$this->render("#");
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
}
?>