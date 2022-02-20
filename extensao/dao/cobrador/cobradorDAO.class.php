<?php
include_once("cobrador.class.php");
class CobradorDAO extends Database{
	public function __construct(){}
	private function __clone(){}
	
	public function __destruct() {
		foreach ($this as $key => $value) {
			unset($this->$key); 
		}
		foreach(array_keys(get_defined_vars()) as $var) {
			unset(${"$var"});
		}
		unset($var);
	}
	
	public function load($fields="*",$add=""){
		if(strlen($add)>0) $add = " ".$add;
		$sql = "SELECT $fields FROM cobrador$add";
		return $this->selectDB($sql,null,'Cobrador');
	}
	
	public function insert($fields,$params=null){
		$numparams="";
		for($i=0; $i<count($params); $i++) $numparams.=",?";
		$numparams = substr($numparams,1);
		$sql = "INSERT INTO cobrador ($fields) VALUES ($numparams)";
		$t=$this->insertDB($sql,$params);
		return $t;
    }
	
	public function update($fields,$params=null,$where=null){
		$fields_T="";
		for($i=0; $i<count($fields); $i++) $fields_T.=", $fields[$i] = ?";
		$fields_T = substr($fields_T,2);
		$sql = "UPDATE cobrador SET $fields_T";
		if(isset($where)) $sql .= " WHERE $where";
		$t=$this->updateDB($sql,$params);
		return $t;
    }
	
	public function delete($where=null,$params=null){
		$sql = "DELETE FROM cobrador";
		if(isset($where)) $sql .= " WHERE $where";
		$t=$this->deleteDB($sql,$params);
		return $t;
    }
}
