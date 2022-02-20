<?php
abstract class Database{
	private static $dbtype   = "mysql";
	private static $host     = "localhost";
	private static $port     = "3306";
	private static $user     = "usuario";
	private static $password = "rspmmRTnm9M5DKz@";
	private static $db       = "relatorioDividas"; 
	
	private function __construct(){}
	
	private function __clone(){}
	
	public function __destruct() {
		$this->disconnect();
		foreach ($this as $key) {
			unset($this->$key);
        }
	}
	
	private function getDBType()  	{return self::$dbtype;}
	private function getHost()    	{return self::$host;}
	private function getPort()    	{return self::$port;}
	private function getUser()    	{return self::$user;}
	private function getPassword()	{return self::$password;}
	private function getDB()      	{return self::$db;}
	
	private function connect(){
		try
		{
			$this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
		}
		catch (PDOException $i)
		{
			die("Erro: <code>" . $i->getMessage() . "</code>");
		}
		
		return ($this->conexao);
	}
	
	private function disconnect(){
		$this->conexao = null;
	}
	

	public function selectDB($sql,$params=null,$class=null){
		$query=$this->connect()->prepare($sql);
		$query->execute($params);
		$rs = (object)[];

		if(isset($class)){
			$rs = $query->fetchAll(PDO::FETCH_CLASS,$class);
		}else{
			$rs = $query->fetchAll(PDO::FETCH_OBJ) or die(print_r($query->errorInfo(), true));
		}
		self::__destruct();
		return $rs;
    }
	
	public function insertDB($sql,$params=null){
		$conexao=$this->connect();
		$query=$conexao->prepare($sql);
		$query->execute($params);
		$rs = $conexao->lastInsertId() or die(print_r($query->errorInfo(), true));
		self::__destruct();
		return $rs;
    }
	
	public function updateDB($sql,$params=null){
		$query=$this->connect()->prepare($sql);
		$query->execute($params);
		$rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
		self::__destruct();
		return $rs;
    }
	
	public function deleteDB($sql,$params=null){
		$query=$this->connect()->prepare($sql);
		$query->execute($params);
		$rs = $query->rowCount();
		self::__destruct();
		return $rs;
    }
}
