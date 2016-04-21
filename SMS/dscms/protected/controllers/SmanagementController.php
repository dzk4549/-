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

	//仓库管理页面渲染
	public function actionIndex()
	{
		$SID = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($SID);

		if ($staff[0]['Spower'] == 3) {
			//获取缺货列表
			//$goodslist = purchase::model()->
			$this->render("purchase", array('goodslist' => $goodslist));
		} else {
			if ($staff[0]['Spower'] == 1) {
				$whlist = warehouse::model()->getWarehouse();
			} else {
				$whlist = warehouse::model()->getWarehouseBySid($SID);
			}
			$this->render("index", array('whlist' => $whlist));
		}
	}

	//仓库管理详情页面渲染
	public function actionWarehouse()
	{
		$this->render("warehouse");
	}

	//货物管理页面渲染
	public function actionGoods()
	{
		$this->render("goods");
	}

	//进货管理页面渲染
	public function actionGoodsin()
	{
		$this->render("goodsin");
	}

	//出货管理页面渲染
	public function actionGoodsout()
	{
		$this->render("goodsout");
	}

	//员工管理页面渲染
	public function actionEmployee()
	{
		$this->render("employee");
	}

	//采购管理页面渲染
	public function actionPurchase()
	{
		$this->render("purchase");
	}

	//日志管理页面渲染
	public function actionLog()
	{
		$this->render("log");
	}

	//验证登录结果
	public function actionLogintoSMS()
	{

	   	// $p = inout::model()->update(array(array('set' => "'InoutTime'='2012-01-23'"),'where'=>"'InoutID'='5'"));
	   	/*$q = inout::model()->getInoutTime();
	   	var_dump($q);*/

	   	//查看是否接收到了员工号，查看session中是否存在值
			if(isset($_POST['SID'])||Yii::app()->session['SID'])
	   	{
	   		$SID = $_POST['SID'];
	   		$SPassword = $_POST['password'];
	   		
	   		$staff = staff::model()->getStaff($SID);

	   		//判断员工表中是否有此员工号
	   		if($staff){
	   			$Password = power::model()->getPassword($staff[0]['Spower']);
				
	   			//判断密码是否匹配
	   			if($Password == $SPassword){

	   				//向session赋值，存员工号
	   				Yii::app()->session['SID']= $SID;
					Yii::app()->session['POWER']= $staff[0]['Spower'];
	   				$this->layout = false;
					$AddLog = Log::model()->AddLog($SID,1);
					if($AddLog||Yii::app()->session['SID']){
						$re = array(
							'error'=>array(
								//0号表示成功进行登录操作
								'error_id'=>0,
								'mess'=>'登陆成功',
								)
							);
						echo json_encode($re);
					}else{
						$re = array(
							'error'=>array(
								//3号错误为没有成功向登录记录表添加操作信息
								'error'=>3,
								'mess'=>'log记录失败',
								)
							);
						 echo json_encode($re);
					}
	   			}else{
	   				$re = array(
	   					'error'=>array(
	   						//2号错误为密码不匹配
	   						'error_id'=>2,
							'mess'=>'密码错误,请重新输入',
	   						)
	   					);
	   				 echo json_encode($re);
	   			}
	   		}else{
	   			$re = array(
	   				'error'=>array(
	   					//1号错误为员工号不匹配
	   					'error_id'=>1,
						'mess'=>'员工号不存在,请确认后重新输入',
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
		unset(Yii::app()->session['SID']);
		unset(Yii::app()->session['POWER']);
	}

	//采购表操作
	public function actionPOperate()
	{

	}
}
?>