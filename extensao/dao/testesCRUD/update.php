<?php
require_once("database.class.php");
include_once("devedor/devedorDAO.class.php");
include_once("cobrador/cobradorDAO.class.php");
include_once("conta/contaDAO.class.php");

$devedorDAO = new DevedorDAO();
$cobradorDAO = new CobradorDAO();
$contaDAO = new ContaDAO();

$fields = array("valorConta","statusConta");
$params = array("800.2",1,5);
$where = "idConta = ?";
$rs = $contaDAO->update($fields,$params,$where);
var_dump($rs); /* N�mero de linhas afetadas */

echo "<br>\n";
$arrConta = $contaDAO->load();
foreach ($arrConta as $key => $row){
    echo $row->getIdConta() . " - " . $row->getNomeConta() . " - "
        . $row->getValorConta() . " - " . $row->getStatusConta() . " - " 
        . $row->getDataVencimento() ."<br>\n";
}