<?php
    include ("conexao.php");

    $sql_code = "SELECT * FROM conta";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <title>Tabela de dívidas</title>
</head>
<body>
    <div class=principal>
    <section id="smallContainer" class="container smallContainer">
        <a href="adicionar.php" class="btn btn-dark btnsEditAdd btnsAdd"><i class="bi bi-plus-circle"></i> Adicionar dívida</a>
        
        <table>
            <thead>
               <tr>
                    <th>STATUS</th>
                    <th>NOME</th>
                    <th>DÍVIDA</th>
                    <th>VALOR</th>
                    <th>DATA</th>
                    <th>PAGADOR</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php while($valor = $sql_query -> fetch_array() ) { ?>
               <tr>
                    <td><?php if($valor["status_conta"]) {echo "Paga";} else {echo "Não paga";} ?></td>
                    <td><?php echo $valor["nome_gastador"]; ?></td>
                    <td><?php echo $valor["nome_conta"]; ?></td>
                    <td><?php echo "R$ ". number_format($valor["valor_conta"], 2); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($valor["data_vencimento"])); ?></td>
                    <td><?php echo $valor["nome_pagador"]; ?></td>
                    <?php
                        $codigo = $valor["id_conta"];
                    ?>
                    <td scope="row" colspan="3">
                        <span class="btn-group">
                            <!-- <a href="#form_edit" class="btns btnsEditAdd btnsEdit"><i class="bi bi-pencil-fill"></i> </a> -->
                            <a href="editar.php?usuario=<?php echo $valor['id_conta']; ?>" class="btns btnsEditAdd btnsEdit"><i class="bi bi-pencil-fill"></i> </a>
                        </span>
                        <span class="btn-group">
                            <a value="delete" class="btns btnsDelete"><i class="bi bi-trash-fill"></i></a>
                        </span>
                        <span class="btn-group">
                            <!-- <a value="showDetails" href="#showDetailsContainer0" class="btns btnsShowDetails"><i class="bi bi-eye-fill"></i></a> -->
                        </span>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </section>
    </div>
</body>
<script src="extensao/js/index.js"></script>