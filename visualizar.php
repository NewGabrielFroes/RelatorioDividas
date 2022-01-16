<?php

    include("conexao.php");

    $sql_codeGastador = "SELECT * FROM gastador";
    $sql_queryGastador = $conn -> query($sql_codeGastador) or die($conn -> error);

    $sql_codePagador = "SELECT * FROM pagador";
    $sql_queryPagador = $conn -> query($sql_codePagador) or die($conn -> error);

    $sql_codeConta = "SELECT * FROM conta";
    $sql_queryConta = $conn -> query($sql_codeConta) or die($conn -> error);

    $codigo = intval($_GET['usuario']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="extensao/css/table.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Tabela de dívidas</title>
</head>

<form action="visualizar.php?usuario=<?php echo $codigo; ?>" method="POST">
    <section id="showDetails" class="container showDetails">
        <a class="btns btnsExitDetails" href="#smallContainer"><i class="bi bi-x-circle"></i></a>
        <table class="tableShowDetails">
            <thead class="showDetailsThead">
                <tr class="showDetailsTr">
                </tr>
            </thead>
            <tbody id="showDetailsContainer0" class="showDetailsContainer showDetailsContainer0">
            <?php while($valor = $sql_queryGastador -> fetch_array() ) { ?>
                <tr class="showDetailsTr">
                    <td>Gastador</td>
                    <td><?php echo $valor["nome_Gastador"]; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($valor["data_criacao_conta"])); ?></td>
                    <td><?php echo $valor["sexo_gastador"]; ?></td>
                    <td><?php echo $valor["cpf_gastador"]; ?></td>
                </tr>
            <?php } ?>
            <?php while($valor = $sql_queryPagador -> fetch_array() ) { ?>
                <tr class="showDetailsTr pagador">
                    <td>Pagador</td>
                    <td><?php echo $valor["nome_pagador"]; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($valor["data_pagamento"])); ?></td>
                    <td><?php echo $valor["sexo_pagador"]; ?></td>
                    <td><?php echo $valor["cpf_pagador"]; ?></td>
                </tr>
            <?php } ?>
            <?php while($valor = $sql_queryConta -> fetch_array() ) { ?>
                <tr class="showDetailsTr conta">
                    <td>Conta</td>
                    <td><?php echo $valor["nome_conta"]; ?></td>
                    <td><?php if($valor["status_conta"]) {echo "Paga";} else {echo "Não paga";} ?></td>
                    <td><?php echo date("d/m/Y", strtotime($valor["data_vencimento"])); ?></td>
                    <td><?php echo "R$ ". str_replace(".", ",", str_replace(",", " ", number_format($valor["valor_conta"], 2))); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </section>
</form>
</html>