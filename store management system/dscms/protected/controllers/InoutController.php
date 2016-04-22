<?php
class InoutController extends CController
{
	//进货操作
	public function actionGoodsIn()
	{
		$q = gin::model()->Goodsin('MF1001',1,3,3,'Adam');
	}

	//出货操作
	public function actionGoodsOut()
	{
		$q = gout::model()->Goodsout($Gid,$Wid,$outNum,$outPrice,$customer);
	}
}
?>