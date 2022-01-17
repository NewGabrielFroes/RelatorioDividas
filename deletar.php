<?php

    include("conexao.php");

    $codigo = intval($_GET['usuario']);

    $sql_code = "DELETE FROM conta WHERE id_conta = $codigo;";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);

    $sql_code = "DELETE FROM pagador WHERE id_pagador = $codigo;";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);

    $sql_code = "DELETE FROM gastador WHERE id_gastador = $codigo;";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);


    if ($sql_query) {
        echo "
        <script>
            alert('A conta foi deletada com sucesso');
            location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            location.href = 'index.php';
        </script>";
    }

?>