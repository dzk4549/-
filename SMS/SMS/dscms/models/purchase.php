<?php
class purchase extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_purchase";
	}

	//检查缺货情况
	public function CheckLack(){
		$sql = 'SELECT * FROM storage_goods WHERE Glack ='1;
		$check = Yii::app()->db->createCommand($sql)->queryAlls();

		echo json_encode($check);
	}

	//id获取采购单
		public function GetPurchase($Pid){
			$sql = 'SELECT * FROM storage_purchase WHERE Pid ='.$Pid;
			$purchase = Yii::app()->db->createCommand($sql)->queryScalar();

			echo json_encode($purchase);
		}

		//获取全部采购单
		public function GetAllPurchase(){
			$sql = 'SELECT * FROM storage_purchase';
			$allpurchase = Yii::app()->db->createCommand($sql)->queryAlls();

			echo json_encode($allpurchase);
		}

	//生成采购单
	public function PurchaseForm($Sid,$Gid,$PGoodsName,$PMax,$PPrice,$PGoodsDescribe,$PWarehouse,$PWDscribe,$PSupplier,$PLevel,$PFinish){
		
		$Add = new purchase;
		$Add->Sid = $Sid;
		$Add->Gid = $Gid;
		$Add->PGoodsName = $PGoodsName;
		$Add->PMax = $PMax;
		$Add->PPrice = $PPrice;
		$Add->PGoodsDescribe = $PGoodsDescribe;
		$Add->PWarehouse = $PWarehouse;
		$Add->PWDscribe = $PWDscribe;
		$Add->PSupplier = $PSupplier;
		$Add->PLevel = PLevel;
		$Add->PFinish = $PFinish;
		$Add->PTime = date('Y-m-d');
		$Add->save();

		if($Add){
			$re = array(
				'error'=>array(
					'error_id'=>2,
					));
			echo json_encode($re);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>3,
					));
			echo json_encode($re);
		}
	}

	//修改
	public function UpdatePurchase($Pid){
		if($Pid){
			$re = array(
				'error'=>array(
					'error_id'=>2,
					));
			echo json_encode($re);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>3,
					));
			echo json_encode($re);
		}
		$sql = 'UPDATE storage_purchase SET Sid ='.$Sid.' , Gid = \'' . $Gid . ' \' , PGoodsName = \'' . $PGoodsName .'\' , PMax =' . $PMax .' , PPrice = ' . $PPrice . ' , PGoodsDescribe = \'' . $PGoodsDescribe .'\' , PSupplier = \'' .$PSupplier.'\' , PLevel = \''.$PLevel.'\' , PFinish = '.$PFinish.' ,PTime = '.date('Y-m-d').' WHERE Pid ='.$Pid;
		$Upurchase = Yii::app()->db->createCommand($sql)->qurey();

		if(Upurchase){
			if($Pid){
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
	}

	//删除
	public function DeletePurchase($Pid){
		if($Pid){
			$re = array(
				'error'=>array(
					'error_id'=>2,
					));
			echo json_encode($re);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>3,
					));
			echo json_encode($re);
		}
		$sql = 'DELETE from storage_purchase where Pid ='.$PID;
		$delete = Yii::app()->db->createCommand($sql)->query();

		if($delete == true){
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
?>