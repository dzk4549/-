<?php
class InoutController extends CController
{
	//货物进出页面渲染
	public function actionGoodsinout()
	{
		$this->layout = false;
		$this->render(Yii::app->session['Power']);
	}

	//根据仓库获得进货单
	public function actionGetIn(){

	}

	//生成进货单
	public function actionGoodsIn(){

		if(isset($_POST['$GID'],$_POST['$WName'],$_POST['$inNum'],$_POST['$inPrice'],$_POST['$supplier'],$_POST['$GWid'])&&Yii::app()->session['SID']){
			$GoodsIn = goods::model()->AddGoods($Gid,$WName,$inNum,$inPrice,$supplier,$GWid);
			
			if($GoodsIn == true){
				$UpdateLog = Log::model()->AddLog(Yii::app()->session['SID'],3);
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
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>2,
					));
			echo json_encode($re);
		}
	}

	//进货确认操作
	public function actionCheckIn()
	{
		$id = $_POST['$id'];
		$q = gin::model()->GinCheck($id);
		if($q == true){
		$DeleteLog = Log::model()->AddLog(Yii::app()->session['SID'],3);//代表进货操作
				$re = array(
					'error'=>array(
						'error_id'=>0,//修改成功
						));
				echo json_encode($re);
			}else{
				
				$re = array(
					'error'=>array(
						'error_id'=>1,//修改失败
						));
				echo json_encode($re);
			}
	}

	//出货操作
	public function actionGoodsOut()
	{

		if(isset($_POST['$GID'],$_POST['$Wid'],$_POST['$outNum'],$_POST['$outPrice'],$_POST['$customer'])&&Yii::app()->session['SID']){
		$q = gout::model()->Goodsout($Gid,$Wid,$outNum,$outPrice,$customer);
		if($q == true){
				$re = array(
					'error'=>array(
						'error_id'=>0,//成功
						));
				echo json_encode($re);
			}else{
				$DeleteLog = Log::model()->AddLog(Yii::app()->session['SID'],4);//4代表出货物操作
				$re = array(
					'error'=>array(
						'error_id'=>1,//失败
						));
				echo json_encode($re);
			}
		}
	}


}
?>