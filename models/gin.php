<?php
class gin extends CActiveRecord
{
	public static function model($className = __CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return "storage_gin";
	}

	//生成进货==
	public function Goodsin($Gid,$Wid,$inNum,$inPrice,$supplier){
		$Add = new gin;
		$Add->Gid = $Gid;
		$Add->Wid = $Wid;
		$Add->inNum = $inNum;
		$Add->inPrice = $inPrice;
		$Add->time = date('Y-m-d');
		$Add->supplier = $supplier;
		$Add->save();

		return $Add;
	}

	//查找进货表
	public function getGoodsIn($WName,$finish){//1为已完成，0为未完成。
		$sql = 'SELECT * FROM storage_gin WHERE WName =\''.$WName.'\' AND GFinish ='.$finish;
		$gin = Yii::app()->createCommand($sql)->queryAll();

		return $gin;
	}

	//仓库管理员收货确认
	public function GinCheck($id){
		$sql = 'UPDATE storage_gin SET GFinish = 1  WHERE id = ' . $id;
        $update = Yii::app()->db->createCommand($sql)->query();

        $sql = 'SELECT * FROM storage_gin WHERE id ='.$id;

        $sql = 'SELECT GQuantity FROM storage_goods where Gid=\''.$Gid.'\'';
		$GQuantity = Yii::app()->db->createCommand($sql)->queryScalar();

		$GNum = $GQuantity + $inNum;

		$sql = 'UPDATE storage_goods SET GQuantity = '.$GNum.'  WHERE Gid = \'' . $Gid.'\'';
        $update = Yii::app()->db->createCommand($sql)->query();

        return $update;
	}

}
?>