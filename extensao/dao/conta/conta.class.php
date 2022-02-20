<?php
class Conta{
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
	
	private $idConta = 0;
	private $nomeConta = "";
	private $valorConta = 0.0;
	private $statusConta = false;
    private $dataVencimento = "";
    private $idDevedor = 0;
    private $idCobrador = 0;
	
    
	public function getIdConta(){
		return $this->idConta;
	}

	public function setIdConta($idConta){
		$this->idConta = $idConta;
	}

	public function getNomeConta(){
		return $this->nomeConta;
	}

	public function setNomeConta($nomeConta){
		$this->nomeConta = $nomeConta;
	}

	public function getValorConta(){
		return $this->valorConta;
	}

	public function setValorConta($valorConta){
		$this->valorConta = $valorConta;
	}

	public function getStatusConta(){
		return $this->statusConta;
	}

	public function setStatusConta($statusConta){
		$this->statusConta = $statusConta;
	}

    public function getDataVencimento(){
        return $this->dataVencimento;
    }

    public function setDataVencimento($dataVencimento){
        $this->dataVencimento = $dataVencimento;
    }

    public function getIdDevedor(){
        return $this->idDevedor;
    }

    public function setIdDevedor($idDevedor){
        $this->idDevedor = $idDevedor;
    }

    public function getIdCobrador(){
        return $this->idCobrador;
    }

    public function setIdCobrador($idCobrador){
        $this->idCobrador = $idCobrador;
    }
}
