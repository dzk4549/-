<?php
class WarehouseController extends CController
{
	//仓库管理页面渲染
	public function actionWarehouse()
	{
		$this->layout = false;
		$this->render("#");
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
}
?>