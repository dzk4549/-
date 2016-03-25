<?php
class InoutController extends CController
{
	//货物进出页面渲染
	public function actionGoodsinout()
	{
		$this->layout = false;
		$this->render("#");
	}

	//进货操作
	public function actionGoodsIn()
	{

	}

	//出货操作
	public function actionGoodsOut()
	{

	}
}
?>