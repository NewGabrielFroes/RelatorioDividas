<?php
require_once("database.class.php");
include_once("usuarioDAO.class.php");
$usuariosDAO = new UsuarioDAO();

$where = "id = ?";
$params = array(7);
$rs = $usuariosDAO->delete($where,$params);
var_dump($rs); /* N�mero de linhas afetadas */

echo "<br>\n";
$arr = $usuariosDAO->load();
foreach ($arr as $key => $row){
	echo $row->getId() . " - " . $row->getNome() . " - "
             . $row->getLogin() . " - " . $row->getSenha() . "<br>\n";
}
?>