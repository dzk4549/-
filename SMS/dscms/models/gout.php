<?php
class gout extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_gout";
	}

	//出货单
	public function Goodsout($Gid,$Wid,$outNum,$outPrice,$customer){

		

		$Add = new gout;
		$Add->Gid = $Gid;
		$Add->Wid = $Wid;
		$Add->outNum = $outNum;
		$Add->outPrice = $outPrice;
		$Add->time = date('Y-m-d');
		$Add->customer = $customer;
		$Add->save();

		$sql = 'SELECT GQuantity FROM storage_goods where Gid=\''.$Gid.'\'';
		$GQuantity = Yii::app()->db->createCommand($sql)->queryScalar();

		$GNum = $GQuantity - $outNum;

		$sql = 'UPDATE storage_goods SET GQuantity = '.$GNum.'  WHERE Gid = \'' . $Gid.'\'';
        $update = Yii::app()->db->createCommand($sql)->query();

        $re
	}

}
?>