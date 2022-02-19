<?php

$hostname = "localhost";
$bancodedados = "controlador_contas";
$usuario = "usuario";
$senha = "rspmmRTnm9M5DKz@";

$conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($conn->connect_errno) {
    echo "Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error;
}