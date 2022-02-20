<?php
class Cobrador{
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
	
	private $idCobrador = 0;
	private $nomeCobrador = "";
	private $cpfCobrador = "";
	private $sexoCobrador = "";
    private $dataPagamento = "";
	
    
	public function getIdCobrador(){
		return $this->idCobrador;
	}

	public function setIdCobrador($idCobrador){
		$this->idCobrador = $idCobrador;
	}

	public function getNomeCobrador(){
		return $this->nomeCobrador;
	}

	public function setNomeCobrador($nomeCobrador){
		$this->nomeCobrador = $nomeCobrador;
	}

	public function getCpfCobrador(){
		return $this->cpfCobrador;
	}

	public function setCpfCobrador($cpfCobrador){
		$this->cpfCobrador = $cpfCobrador;
	}

	public function getSexoCobrador(){
		return $this->sexoCobrador;
	}

	public function setSexoCobrador($sexoCobrador){
		$this->sexoCobrador = $sexoCobrador;
	}

    public function getDataPagamento(){
        return $this->dataPagamento;
    }

    public function setDataPagamento($dataPagamento){
        $this->dataPagamento = $dataPagamento;
    }
}
