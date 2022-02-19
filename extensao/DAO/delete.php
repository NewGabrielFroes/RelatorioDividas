<?php
require_once("database.class.php");
include_once("devedor/devedorDAO.class.php");
include_once("cobrador/cobradorDAO.class.php");
include_once("conta/contaDAO.class.php");

$devedorDAO = new DevedorDAO();
$cobradorDAO = new CobradorDAO();
$contaDAO = new ContaDAO();

$where = "idConta = ?";
$params = array(17);
$rs = $contaDAO->delete($where,$params);
var_dump($rs); /* N�mero de linhas afetadas */

$where = "idDevedor = ?";
$params = array(18);
$rs = $devedorDAO->delete($where,$params);
var_dump($rs); /* N�mero de linhas afetadas */

$where = "idCobrador = ?";
$params = array(18);
$rs = $cobradorDAO->delete($where,$params);
print_r("cu".$rs);
var_dump($rs); /* N�mero de linhas afetadas */

echo "<br>\n";
$arr = $contaDAO->load();
foreach ($arr as $key => $row){
    echo $row->getIdConta() . " - " . $row->getNomeConta() . " - "
    . $row->getValorConta() . " - " . $row->getStatusConta() . " - " 
    . $row->getDataVencimento() ."<br>\n";
}