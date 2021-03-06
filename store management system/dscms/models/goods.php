<?php
class goods extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_goods";
	}

	//添加货物信息
	public function AddGoods($Gid,$GName,$GPrice,$GQuantity,$GToplimit,$GLowerlimit,$GWid){
		$Add = new goods;
		$Add->Gid = $Gid;
		$Add->GName = $GName;
		$Add->GPrice = $GPrice;
		$Add->GQuantity = $GQuantity;
		$Add->GToplimit = $GToplimit;
		$Add->GLowerlimit = $GLowerlimit;
		if($GQuantity<$GLowerlimit){
			$Add->Glack = 1;
		}else{
			$Add->Glack = 0;
		}
		$Add->GWid = $GWid;
		$Add->save();
	}
	

	//删除货物信息
	public function DeleteGoods($GID){
		$sql = 'DELETE from storage_goods where Gid ='.$GID;
		$delete = Yii::app()->db->createCommand($sql)->query();
		if($delete){
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

	//修改货物信息
	public function UpdateGoods($Gid,$GName,$GPrice,$GQuantity,$GToplimit,$GLowerlimit,$GWid){
		$sql = 'UPDATE storage_goods SET Gid = ' . $Gid . ' , GName =' . $GName . ' ,  GPrice =\'' . $GPlace . '\'  , GQuantity = \''. $GQuantity . '\'  , GToplimit = \'' . $GToplimit . '\'  , GLowerlimit = \'' . $GLowerlimit . '\'  , GWid = \'' . $GWid . '\'  WHERE Sid = ' . $GID;
        $update = Yii::app()->db->createCommand($sql)->query();

        if($GQuantity<$GLowerlimit){
        	$sql = 'UPDATE storage_goods SET Glack = 1 WHERE Gid = '.$Gid;
        	$check = Yii::app()->db->createCommand($sql)->query();
        }else{
        	$sql = 'UPDATE storage_goods SET Glack = 0 WHERE Gid = '.$Gid;
        	$check = Yii::app()->db->createCommand($sql)->query();
        }
        
            	
        var_dump($update);
		if($update == true){
			$re = array(
				'error' => array(
					'error_id'=>0,
					)
				);
			echo json_encode($re);
		}else{
			$re = array(
				'error'=>array(
					'error_id'=>1,
				));
			echo json_encode($re);
		}
				
	}

//	//查询特定货物信息
//	public function FindGoods($GID){
//		$sql = 'SELECT * FROM storage_goods where Gid='.$GID;
//		$Goods = Yii::app()->db->createCommand($sql)->queryAlls();
//		return $Goods;
//	}
//
//	//查询所有货物信息
//	public function FindAllGoods(){
//		$sql = 'SELECT * FROM storage_goods';
//		$AllGoods = Yii::app()->db->createCommand($sql)->queryAll();
//		return $AllGoods;
//	}

	//查询货物信息
	public function getStaff($GID = 0){
		$sql = $GID == 0 ? 'SELECT * FROM storage_goods' : 'SELECT * FROM storage_goods WHERE Gid = '. $GID;
		$Goods = Yii::app()->db->createCommand($sql)->queryAll();
		return $Goods;
	}

	//对进出货操作以后的货物数据作出调整
	public function ChangeNum($kind,$Gid,$Num){
		if($kind == 1){
			$sql = 'SELECT GQuantity, FROM storage_goods WHERE Gid ='.$Gid;
			$check = Yii::app()->db->createCommand($sql)->queryScalar();
			if($check == 0){

			}
			$sql = 'UPDATE storage_goods SET Glack = 1'
		}else{

		}
	}
}
?>