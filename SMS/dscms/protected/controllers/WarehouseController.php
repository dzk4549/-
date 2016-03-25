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
		$AddWarehouse = warehouse::model()->AddWarehouse(1,1,'sjz','I have a dream.');
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
	}

	//修改仓库设置
	public function actionWChange()
	{

	}

	//删除仓库信息
	public function actionWDelete()
	{
		$q = warehouse::model()->DeleteWarehouse(2);
	}
}
?>