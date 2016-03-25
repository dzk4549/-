<?php
class GoodsController extends CController
{
	//货物管理页面渲染
	public function actionGoods()
	{
		$this->layout = false;
		$this->render("#");
	}

	//添加货物信息
	public function actionAddGoods()
	{
		$AddGoods = goods::model()->AddGoods(1,1,1,1,1,1,1);
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
	}

	//获取货物信息
	public function actionGetGoods()
	{

	}

	//修改货物信息
	public function actionUpdateGoods()
	{

	}

	//删除货物信息
	public function actionDeleteGoods()
	{
		$q = goods::model()->DeleteGoods(1);
	}
}
?>