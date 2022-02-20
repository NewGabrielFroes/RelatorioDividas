<?php
require_once("database.class.php");
include_once("devedor/devedorDAO.class.php");
include_once("cobrador/cobradorDAO.class.php");
include_once("conta/contaDAO.class.php");


$devedorDAO = new DevedorDAO();
$cobradorDAO = new CobradorDAO();
$contaDAO = new ContaDAO();

$arrDevedor = $devedorDAO->load();
$arrCobrador = $cobradorDAO->load();
$arrConta = $contaDAO->load();

foreach ($arrConta as $key => $row){
    echo $row->getIdConta() . " - " . $row->getNomeConta() . " - "
            . $row->getValorConta() . " - " . $row->getStatusConta() . " - " 
            . $row->getDataVencimento() ."<br>\n";
    
    foreach ($arrDevedor as $key => $row){
        echo $row->getIdDevedor() . " - " . $row->getNomeDevedor() . " - "
                    . $row->getCpfDevedor() . " - " . $row->getSexoDevedor() . " - " 
                    . $row->getDataCriacaoConta() ."<br>\n";
    }
    
    foreach ($arrCobrador as $key => $row){
        echo $row->getIdCobrador() . " - " . $row->getNomeCobrador() . " - "
        . $row->getCpfCobrador() . " - " . $row->getSexoCobrador() . " - " 
        . $row->getDataPagamento() ."<br>\n";
    }
}

        
$fields = "idConta,nomeConta";
$add = "WHERE idConta = 17";
$arr = $contaDAO->load($fields,$add);
echo "<br>\n" . $arr[0]->getIdConta() . " - " . $arr[0]->getNomeConta() . "<br>\n";
            



