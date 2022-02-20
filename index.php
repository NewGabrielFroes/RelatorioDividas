<?php

    require_once("extensao/dao/database.class.php");
    include_once("extensao/dao/devedor/devedorDAO.class.php");
    include_once("extensao/dao/cobrador/cobradorDAO.class.php");
    include_once("extensao/dao/conta/contaDAO.class.php");


    $devedorDAO = new DevedorDAO();
    $cobradorDAO = new CobradorDAO();
    $contaDAO = new ContaDAO();
    

    $arrDevedor = $devedorDAO->load();
    $arrCobrador = $cobradorDAO->load();
    $arrConta = $contaDAO->load();

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
    <script></script>
    <title>Tabela de Dívidas</title>
</head>
<body>
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
                        <th>COBRADOR</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrConta as $key => $row) { ?>
                        <?php
                            $idDevedor = $row->getIdDevedor();
                            $fields = "nomeDevedor";
                            $add = "WHERE idDevedor = $idDevedor";
                            $arr = $devedorDAO->load($fields, $add);
                            $nomeDevedor = $arr[0]->getNomeDevedor();

                            $idCobrador = $row->getIdCobrador();
                            $fields = "nomeCobrador";
                            $add = "WHERE idCobrador = $idCobrador";
                            $arr = $cobradorDAO->load($fields, $add);
                            $nomeCobrador = $arr[0]->getNomeCobrador();

                            $idConta = $row->getIdConta();
                            $valorConta = "R$ ". str_replace(".", ",", str_replace(",", " ", number_format($row->getValorConta(), 2)));
                            $dataVencimento = date("d/m/Y", strtotime($row->getDataVencimento()));
                            $statusConta = $row->getStatusConta() ?  "Paga" : "Não paga";
                            $nomeConta = $row->getNomeConta();
                        ?>
                        <tr>
                            <td><?php echo $statusConta; ?></td>
                            <td><?php echo $nomeDevedor; ?></td>
                            <td><?php echo $nomeConta; ?></td>
                            <td><?php echo $valorConta; ?></td>
                            <td><?php echo $dataVencimento; ?></td>
                            <td><?php echo $nomeCobrador; ?></td>
                            <td scope="row" colspan="3">
                                <span class="btn-group">
                                    <a href="editar.php?usuario=<?php echo $idConta; ?>" class="btns btnsEditAdd btnsEdit"><i class="bi bi-pencil-fill"></i> </a>
                                </span>
                                <span class="btn-group">
                                    <a value="delete" href="javascript: if(confirm('Confirme para excluir a conta selecionada')){
                                        location.href = 'deletar.php?usuario=<?php echo $idConta; ?>';}" class="btns btnsDelete">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </span>
                                <span class="btn-group">
                                    <a value="showDetails" href="visualizar.php?usuario=<?php echo $idConta; ?>" class="btns btnsShowDetails"><i class="bi bi-eye-fill"></i></a>
                                </span>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
    </section>
    <script src="extensao/js/index.js"></script>
</body>
</html>