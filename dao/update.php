<?php
require_once("conexao.php");
include_once("usuarioDAO.class.php");
$usuariosDAO = new UsuarioDAO();

$fields = array("login","senha");
$params = array("teste login","teste senha",3);
$where = "id = ?";
$rs = $usuariosDAO->update($fields,$params,$where);
var_dump($rs); /* Número de linhas afetadas */

echo "<br>\n";
$arr = $usuariosDAO->load();
foreach ($arr as $key => $row){
	echo $row->getId() . " - " . $row->getNome() . " - "
             . $row->getLogin() . " - " . $row->getSenha() . "<br>\n";
}
?>