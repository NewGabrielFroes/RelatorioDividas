<?php

$hostname = "localhost";
$bancodedados = "controlador_contas";
$usuario = "usuario";
$senha = "usr01";

$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($conn->connect_errno) {
    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
}