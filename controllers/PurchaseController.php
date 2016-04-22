<?php
class purchaseController extends CController
{
	//采购页面渲染
	public function actionGoodsinout()
	{
		$this->layout = false;
		$this->render("Yii::app->session['Power']");
	}

	//生成采购单 操作
	public function actionGoodsIn()
	{
	
		$sql = 'SELECT storage_goods.*,storage_warehouse.WRemark FROM storage_goods left join storage_warehouse ON storage_goods.GWName = storage_warehouse.WName WHERE storage_goods.Glack =1';
		$check = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = 'SELECT GQuantity FROM storage_goods WHERE Glack =1';
		$num = Yii::app()->db->createCommand($sql)->queryScalar();

		$addarr = array();

		foreach((array)$num as $n){

			if($n == 0){
				$addarr[] = 1;//当前数量为0，最高级1级缺货度
			}else{

				$addarr[] = 2;//尚有库存，但是数量低于警戒线

			}
			
		}

		if($check){
			echo json_encode(array_merge($check,$addarr));//各种属性加缺货程度值
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