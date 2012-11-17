<?php
class HDbAuthManager extends CDbAuthManager {
	
	public function getRootItems($type) {
		
		$innerCommand = $this->db->createCommand()
			->select('t2.*')
			->from($this->itemChildTable.' as t2')
			->leftJoin($this->itemTable.' as t3', 't2.`parent`=t3.`name`')
			->where('t3.type=:type', array(':type'=>$type));
			
		$command = $this->db->createCommand()
			->select('t1.*')
			->from($this->itemTable.' as t1')
			->leftJoin('('.$innerCommand->getText().') as t4', 't1.`name`=t4.`child`')
			->where('t4.`child` is null and t1.`type`=:type', array(':type'=>$type));
		
			
		$rows = $command->queryAll();
		
		$items=array();
		foreach($rows as $row) {
			if(($data=@unserialize($row['data']))===false)
				$data=null;
			$items[$row['name']]=new CAuthItem($this,$row['name'],$row['type'],$row['description'],$row['bizrule'],$data);
		}
		return $items;
	}
	
}

?>