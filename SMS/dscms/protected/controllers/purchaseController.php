<?php
class purchaseController extends CController
{
	//采购页面渲染
	public function actionGoodsinout()
	{
		$this->layout = false;
		$this->render("#");
	}

	//进货操作
	public function actionGoodsIn()
	{
		$q = gin::model()->Goodsin('MF1001',1,3,3,'Adam');
	}
}
?>