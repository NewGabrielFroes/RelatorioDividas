<?php
require_once("database.class.php");
include_once("usuarioDAO.class.php");
$usuariosDAO = new UsuarioDAO();

$arr = $usuariosDAO->load();


foreach ($arr as $key => $row){
	echo $row->getId() . " - " . $row->getNome() . " - "
             . $row->getLogin() . " - " . $row->getSenha() . "<br>\n";
}

$fields = "id,nome";
$add = "WHERE id = 1";
$arr = $usuariosDAO->load($fields,$add);
echo "<br>\n" . $arr[0]->getId() . " - " . $arr[0]->getNome() . "<br>\n";
