<?php

    include("conexao.php");

    $sql_code = "SELECT 
    c.status_conta, g.nome_Gastador, c.nome_conta, c.valor_conta, c.data_vencimento, c.id_conta, p.nome_pagador
    FROM gastador g, pagador p, conta c 
    WHERE c.id_gastador = g.id_gastador and c.id_pagador = p.id_pagador ORDER BY c.id_conta DESC";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);

    ///////////////////
    ////EDITAR/////////
    /////////////////// 

    // else if (isset($_POST['btnEditar'])) {
        
    //     $nome_Gastador = $_POST['nome_Gastador'];
    //     $cpf_Gastador = $_POST['cpf_Gastador'];
    //     $data_Criacao_Conta = $_POST['data_Criacao_Conta'];
    //     $sexo = $_POST['sexo'];

    //     $nome_Pagador = $_POST['nome_Pagador'];
    //     $cpf_Pagador = $_POST['cpf_Pagador'];
    //     $data_Pagamento = $_POST['data_Pagamento'];
    //     $sexo_Pagador = $_POST['sexo_Pagador'];

    //     $nome_Conta = $_POST['nome_Conta'];
    //     $valor_Conta = $_POST['valor_Conta'];
    //     $data_Vencimento = $_POST['data_Vencimento'];
    //     $status = $_POST['status'];

    //     $gastador = mysqli_query($conn, "UPDATE gastador
    //     SET nome_Gastador = '$nome_Gastador',
    //         cpf_gastador = '$cpf_Gastador',
    //         sexo_gastador = '$sexo',
    //         data_criacao_conta = '$data_Criacao_Conta'
    //     WHERE id_conta = '$codigo';");  //SQL

    //     $pagador = mysqli_query($conn, "UPDATE pagador
    //     SET nome_pagador = '$nome_Pagador',
    //         cpf_pagador = '$cpf_Pagador',
    //         sexo_pagador = '$sexo_Pagador',
    //         data_pagamento = '$data_Pagamento'
    //     WHERE id_conta = '$codigo';");  //SQL

    //     $conta = mysqli_query($conn, "UPDATE conta
    //     SET nome_conta = '$nome_Conta',
    //         valor_conta = '$valor_Conta',
    //         data_vencimento = '$data_Vencimento',
    //         status_conta = '$status',
    //         nome_gastador = '$nome_Gastador',
    //         nome_pagador = '$nome_Pagador'
    //     WHERE id_conta = '$codigo';");  //SQL

    // }

    ///////////////////
    ////EXCLUIR////////
    /////////////////// 

    // else if (isset($_POST['action'])) {
    //     if ($_POST['action'] == 'delete') {
    //         echo("DELETADO");
    //     }

    // ///////////////////
    // ////MOSTAR/////////
    // /////////////////// 

    //     else if (($_POST['action'] == 'details')) {
    //         echo("DETALHADO");
    //     }
    // }   


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
<body>
    

    <section id="smallContainer" class="container smallContainer">
        <form action="index.php" method="POST">

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
                        <td><?php echo $valor['nome_Gastador']; ?></td>
                        <td><?php echo $valor["nome_conta"]; ?></td>
                        <td><?php echo "R$ ". str_replace(".", ",", str_replace(",", " ", number_format($valor["valor_conta"], 2))); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($valor["data_vencimento"])); ?></td>
                        <td><?php echo $valor['nome_pagador']; ?></td>
                        <td scope="row" colspan="3">
                            <span class="btn-group">
                                <a href="editar.php?usuario=<?php echo $valor['id_conta']; ?>" class="btns btnsEditAdd btnsEdit"><i class="bi bi-pencil-fill"></i> </a>
                            </span>
                            <span class="btn-group">
                                <a value="delete" href="javascript: if(confirm('Confirme para excluir a conta selecionada'))
                                location.href = 'deletar.php?usuario=<?php echo $valor['id_conta']; ?>'" class="btns btnsDelete"><i class="bi bi-trash-fill"></i></a>
                            </span>
                            <span class="btn-group">
                                <a value="showDetails" href="visualizar.php?usuario=<?php echo $valor['id_conta']; ?>" class="btns btnsShowDetails"><i class="bi bi-eye-fill"></i></a>
                            </span>
                        </td>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
            
        </form>
    </section>
    <script src="extensao/js/index.js"></script>
</body>
</html>