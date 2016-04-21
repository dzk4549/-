<?php
class purchaseController extends CController
{
	//采购页面渲染
	public function actionGoodsinout()
	{
		$this->layout = false;
		$this->render(Yii::app->session['Power']);
	}

	//生成采购单 操作
	public function actionGoodsIn()
	{
	
		$sql = 'SELECT storage_goods.*,storage_warehouse.WRemark FROM storage_goods left join storage_warehouse ON storage_goods.GWName = storage_warehouse.WName WHERE storage_goods.Glack =1';
		$check = Yii::app()->db->createCommand($sql)->queryAll();

		//var_dump($check);

		if($check){
			$re = array(
				'error' => array(
					'error_id'=>0,
					)
				);
			echo json_encode($check);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>1,
				));
			echo json_encode($re);
		}
	}
}
?>