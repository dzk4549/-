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
	public function UpdateGoods(){

	}

	//查询特定货物信息
	public function FindGoods(){

	}

	//查询所有货物信息
}
?>