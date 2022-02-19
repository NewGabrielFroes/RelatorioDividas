<?php
require_once("database.class.php");
include_once("usuarioDAO.class.php");
$usuariosDAO = new UsuarioDAO();

$fields = "nome,login,senha";
$params = array("Ingrid","login1","senha1");
$rs = $usuariosDAO->insert($fields,$params);
var_dump($rs);

$fields = "nome,login,senha";
$params = array("VOVO","login2","senha2");
$rs = $usuariosDAO->insert($fields,$params);
var_dump($rs);

$fields = "nome,login,senha";
$params = array("Carlos","login3","senha3");
$rs = $usuariosDAO->insert($fields,$params);
var_dump($rs);

$fields = "nome,login,senha";
$params = array("Georgia","login4","senha4");
$rs = $usuariosDAO->insert($fields,$params);
var_dump($rs);