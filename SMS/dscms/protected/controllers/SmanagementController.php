<?php
//class SmanagementController extends CController
//{
//	//登录页面
//	public function actionLogin()
//	{
//	   	// $p = inout::model()->update(array(array('set' => "'InoutTime'='2012-01-23'"),'where'=>"'InoutID'='5'"));
//	   	$q = inout::model()->getInoutTime();
//	    // var_dump($q);
//	    $this->layout= '//layouts/main';
//	 	$this->renderPartial("login",array("inout"=>$q));
//	}
//	public function actionIndex(){
//		$this->render("index");
//	}

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
	   	if(isset($_POST['SID'])||Yii::app()->session['var'])
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
	   				Yii::app()->session['var']= $SID;
	   				$this->layout = false;
					$AddLog = Log::model()->AddLog($SID,1);
					if($AddLog||Yii::app()->session['var']){
						$re = array(
							'error'=>array(
								//0号表示成功进行登录操作
								'error_id'=>0,
								'url'=>"www.baidu.com",
								)
							);
						var_dump(Yii::app()->session['var']);
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

//	}
//
//	//员工信息管理页面渲染
//	public function actionEmployee()
//	{
//		$this->render("employee");
//	}
//
//	//增加员工信息
//	public function actionEAdd()
//	{
//
//	}
//
//	//员工信息修改
//	public function actionEChange()
//	{
//
//	}
//
//	//员工信息删除
//	public function actionEDelete()
//	{
//
//	}
//
//	//仓库管理页面渲染
//	public function actionWarehouse()
//	{
//		$this->render("warehouse");
//	}
//
//	//添加仓库
//	public function actionWAdd()
//	{
//
//	}
//
//	//修改仓库设置
//	public function actionWChange()
//	{
//
//	}
//
//	//删除仓库信息
//	public function actionWDelete()
//	{
//
//	}
//
//	//货物管理页面渲染
//	public function actionGoods()
//	{
//		$this->render("goods");
//	}
//
//	//获取货物信息
//	public function actionGetGoods()
//	{
//
//	}
//
//	//修改货物信息
//	public function actionGChange()
//	{
//
//	}
//
//	//删除货物信息
//	public function actionGDelete()
//	{
//
//	}
//
//	//渲染进货明细页面
//	public function actionGoodsin()
//	{
//		$this->render("goodsin");
//	}
//
//	//渲染出货明细页面
//	public function actionGoodsout()
//	{
//		$this->render("goodsout");
//	}
//
//	public function actionPurchase()
//	{
//		$this->render("purchase");
//	}
//
//	public function actionInout()
//	{
//
//	}
//	public function actionLog()
//	{
//		$this->render("log");
//	}
//}

		$this->layout = false;
		$SID = Yii::app()->session['var'];
		$QuitLog = Log::model()->AddLog($SID,2);
		unset(Yii::app()->session['var']);
	}

	
	//渲染采购表
	public function actionPurchase()
	{
		$this->layout = false;
		$this->render("#");
	}

	//采购表操作
	public function actionPOperate()
	{

	}
}
?>