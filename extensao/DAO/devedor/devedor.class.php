<?php
class Devedor{
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
	
    private $idDevedor = 0;
	private $nomeDevedor = "";
	private $cpfDevedor = "";
	private $sexoDevedor = "";
    private $dataCriacaoConta = "";
	
    
	public function getIdDevedor(){
		return $this->idDevedor;
	}
	public function setIdDevedor($idDevedor){
		$this->id = intval($idDevedor);
	}
	
	public function getNomeDevedor(){
		return $this->nomeDevedor;
	}
	public function setNomeDevedor($nomeDevedor){
		$this->nome = $nomeDevedor;
	}

	public function getCpfDevedor(){
		return $this->cpfDevedor;
	}

	public function setCpfDevedor($cpfDevedor){
		$this->cpfDevedor = $cpfDevedor;
	}

	public function getSexoDevedor(){
		return $this->sexoDevedor;
	}

	public function setSexoDevedor($sexoDevedor){
		$this->sexoDevedor = $sexoDevedor;
	}

    public function getDataCriacaoConta(){
        return $this->dataCriacaoConta;
    }

    public function setDataCriacaoConta($dataCriacaoConta){
        $this->dataCriacaoConta = $dataCriacaoConta;
    }

}
?>