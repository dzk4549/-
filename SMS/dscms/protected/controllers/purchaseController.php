<?php
class purchaseController extends CController
{
	//进货操作
	public function actionGoodsIn()
	{
		$q = gin::model()->Goodsin('MF1001',1,3,3,'Adam');
	}
}
?>