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
	//**
	//**页面渲染_begin
	//**
	//渲染登录页面
	public function actionLogin()
	{
		$this->layout = false;
		$this->render("login");
	}

	//渲染主页:根据用户权限展示不同的页面/权限1,2:仓库管理页面;3:采购管理页面
	public function actionIndex()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);

		if ($staff[0]['Spower'] == 3) {
			//获取缺货列表
			//$goodslist = purchase::model()->
			//$this->render("purchase", array('goodslist' => $goodslist));
		} else {
			if ($staff[0]['Spower'] == 1) {
				$whlist = warehouse::model()->getWarehouse();
			} else {
				$whlist = warehouse::model()->getWarehouseBySid($Sid);
			}
			$this->render("index", array('staff'=> $staff,'whlist' => $whlist));
		}
	}

	//仓库详情管理页面渲染
	public function actionWarehouse()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$Wid = $_GET['Wid'];
		$warehouse = Warehouse::model()->getWarehouse($Wid);
		$goodslist = Goods::model()->getGoodsByWid($Wid);
		$this->render("warehouse", array('staff'=> $staff, 'warehouse'=> $warehouse, 'goodslist'=> $goodslist));
	}

	//人员管理页面渲染
	public function actionEmployee()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("employee", array('staff'=> $staff));
	}

	//货物管理页面渲染
	public function actionGoods()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("goods", array('staff'=> $staff));
	}

	//进货管理页面渲染
	public function actionGoodsin()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("goodsin", array('staff'=> $staff));
	}

	//出货管理页面渲染
	public function actionGoodsout()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("goodsout", array('staff'=> $staff));
	}

	//采购管理页面渲染
	public function actionPurchase()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("purchase", array('staff'=> $staff));
	}

	//日志管理页面渲染
	public function actionLog()
	{
		$Sid = Yii::app()->session['SID'];
		$staff = staff::model()->getStaff($Sid);
		$this->render("log", array('staff'=> $staff));
	}
	//**
	//**页面渲染_begin
	//**

	//验证登录结果
	public function actionLogintoSMS()
	{
	   	//查看是否接收到了员工号，查看session中是否存在值
	   	if(isset($_POST['SID'])||Yii::app()->session['SID'])
	   	{
	   		$Sid = $_POST['SID'];
	   		$SPassword = $_POST['password'];
	   		
	   		$staff = staff::model()->getStaff($Sid);
	
	   		//判断员工表中是否有此员工号
	   		if($staff){
	   			$Password = power::model()->getPassword($staff[0]['Spower']);
				
	   			//判断密码是否匹配
	   			if($Password == $SPassword){

	   				//向session赋值，存员工号
	   				Yii::app()->session['SID']= $Sid;
					Yii::app()->session['POWER']= $staff[0]['Spower'];
	   				$this->layout = false;
					$AddLog = Log::model()->AddLog($Sid,1);
					if($AddLog||Yii::app()->session['SID']){
						$re = array(
							'error'=>array(
								//0号表示成功进行登录操作
								'error_id'=>0,
								)
							);
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
		unset(Yii::app()->session['SID']);
		unset(Yii::app()->session['POWER']);
	}
}
?>