<?php

//仓库管理系统登录登出操作与采购功能
class SmanagementController extends CController
{
	//渲染登录页面
	public function actionLogin()
	{
		$this->layout = false;
		$this->render("login");
	}

	//验证登录结果
	public function actionLogintoSMS()
	{	
	   	$this->layout = false;
	   	// $p = inout::model()->update(array(array('set' => "'InoutTime'='2012-01-23'"),'where'=>"'InoutID'='5'"));
	   	/*$q = inout::model()->getInoutTime();
	   	var_dump($q);*/

	   	//查看是否接收到了员工号，查看session中是否存在值
	   	if(isset($_POST['SID'])||Yii::app()->session['SID'])
	   	{
	   		$SID = $_POST['SID'];
	   		$SPassword = $_POST['password'];
	   		
	   		$Power = staff::model()->getLoginMessage($SID);
	
	   		//判断员工表中是否有此员工号
	   		if($Power){
	   			$Password = power::model()->getPassword($Power);
				
	   			//判断密码是否匹配
	   			if($Password == $SPassword){

	   				//向session赋值，存员工号
	   				Yii::app()->session['SID']= $SID;
	   				Yii::app()->session['Power'] = $Power;
	   				$this->layout = false;
					$AddLog = Log::model()->AddLog($SID,1);
					if($AddLog||Yii::app()->session['SID']){
						$re = array(
							'error'=>array(
								//0号表示成功进行登录操作
								'error_id'=>0,
								'url'=>"www.baidu.com",
								)
							);
						//var_dump(Yii::app()->session['SID']);
						echo json_encode($re);
					}else{
						$re = array(
							'error'=>array(
								//3号错误为没有成功向登录记录表添加操作信息
								'error'=>3,
								)
							);
						 echo json_encode($re);
					}
	   			}else{
	   				$re = array(
	   					'error'=>array(
	   						//2号错误为密码不匹配
	   						'error_id'=>2,
	   						)
	   					);
	   				 echo json_encode($re);
	   			}
	   		}else{
	   			$re = array(
	   				'error'=>array(
	   					//1号错误为员工号不匹配
	   					'error_id'=>1,
	   					)
	   				);
	   			 echo json_encode($re);
	   		}
	   	}
	} 

	//登出页面，撤销session
	public function actionLogout()
	{
		$this->layout = false;
		$SID = Yii::app()->session['SID'];
		$QuitLog = Log::model()->AddLog($SID,2);
		unset(Yii::app()->session['SID'],Yii::app()->session['Power']);
	}
}

?>