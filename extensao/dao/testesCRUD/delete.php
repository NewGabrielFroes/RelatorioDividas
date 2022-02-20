<?php
require_once("database.class.php");
include_once("devedor/devedorDAO.class.php");
include_once("cobrador/cobradorDAO.class.php");
include_once("conta/contaDAO.class.php");

$devedorDAO = new DevedorDAO();
$cobradorDAO = new CobradorDAO();
$contaDAO = new ContaDAO();

$where = "idDevedor = ?";
$params = array(4);
$rs = $devedorDAO->delete($where,$params); 
var_dump($rs);

$where = "idCobrador = ?";
$params = array(4);
$rs = $cobradorDAO->delete($where,$params);
var_dump($rs);


/*Quando um devedor ou cobrador é apagado, a conta é automaticamente deletada*/ 
