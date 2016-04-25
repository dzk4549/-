<?php
class LogController extends CController
{
	//页面渲染++
	public function actionLog(){
		$this->layout = false;
		$this->render(Yii::app->session['Power']);
	}

	//存入操作记录
	public function actionLog(){
		$SID = Yii::app()->session['SID'];
		$Log = Log::model()->AddLog($SID,$State);

		if($Log){
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

	//查询记录
	public function actionGetLog(){
		
		$getLog = Log::model()->getLog();
		if($getLog){
			echo json_encode($getLog);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>1,//查询失败
					));
			echo json_encode($re);
		}

	}
}
?>