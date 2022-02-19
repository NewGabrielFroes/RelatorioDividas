<?php
require_once("database.class.php");
include_once("devedor/devedorDAO.class.php");
include_once("cobrador/cobradorDAO.class.php");
include_once("conta/contaDAO.class.php");


$devedorDAO = new devedorDAO();
$fields = "nomeDevedor,cpfDevedor,sexoDevedor,dataCriacaoConta";
$data = date("Y-m-d", strtotime("20-02-2022"));
$params = array("Pedro","888888888","Masculino",$data);
$idDevedor = $devedorDAO->insert($fields,$params);
var_dump($idDevedor);

$cobradorDAO = new cobradorDAO();
$fields = "nomeCobrador,cpfCobrador,sexoCobrador,dataPagamento";
$data = date("Y-m-d", strtotime("21-02-2022"));
$params = array("Maria","77777777","Feminino",$data);
$idCobrador = $cobradorDAO->insert($fields,$params);
var_dump($idCobrador);

$contaDAO = new ContaDAO();
$fields = "nomeConta,valorConta,statusConta,dataVencimento,idDevedor,idCobrador";
$data = date("Y-m-d", strtotime("22-02-2022"));
$params = array("Cartao","200.20",true,$data,$idDevedor,$idCobrador);
$rs = $contaDAO->insert($fields,$params);   
var_dump($rs);