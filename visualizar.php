<?php

    require_once("extensao/dao/database.class.php");
    include_once("extensao/dao/devedor/devedorDAO.class.php");
    include_once("extensao/dao/cobrador/cobradorDAO.class.php");
    include_once("extensao/dao/conta/contaDAO.class.php");
    
    $codigo = intval($_GET['usuario']);

    $devedorDAO = new DevedorDAO();
    $cobradorDAO = new CobradorDAO();
    $contaDAO = new ContaDAO();
    
    $arrDevedor = $devedorDAO->load();
    $arrCobrador = $cobradorDAO->load();
    $arrConta = $contaDAO->load();
    
    $fields = "*";
    $add = "WHERE idDevedor = $codigo";
    $arr = $devedorDAO->load($fields, $add);
    $nomeDevedor = $arr[0]->getNomeDevedor();
    $sexoDevedor = $arr[0]->getSexoDevedor();
    $cpfDevedor = $arr[0]->getCpfDevedor();
    $dataCriacaoConta = date("d/m/Y", strtotime($arr[0]->getDataCriacaoConta()));

    $fields = "*";
    $add = "WHERE idCobrador = $codigo";
    $arr = $cobradorDAO->load($fields, $add);
    $nomeCobrador = $arr[0]->getNomeCobrador();
    $sexoCobrador= $arr[0]->getSexoCobrador();
    $cpfCobrador = $arr[0]->getCpfCobrador();
    $dataPagamento= date("d/m/Y", strtotime($arr[0]->getDataPagamento()));

    $fields = "*";
    $add = "WHERE idConta= $codigo";
    $arr = $contaDAO->load($fields, $add);
    $nomeConta= $arr[0]->getNomeConta();
    $valorConta = "R$ ". str_replace(".", ",", str_replace(",", " ", number_format($arr[0]->getValorConta(), 2)));
    $statusConta = $arr[0]->getStatusConta() ?  "Paga" : "Não paga";
    $dataVencimento = date("d/m/Y", strtotime($arr[0]->getDataVencimento()));
    
    
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
    <title>Tabela de Dívidas</title>
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
                <tr class="showDetailsTr">
                    <td>Devedor</td>
                    <td><?php echo $nomeDevedor; ?></td>
                    <td><?php echo $sexoDevedor; ?></td>
                    <td><?php echo $cpfDevedor; ?></td>
                    <td><?php echo $dataCriacaoConta; ?></td>
                </tr>
                <tr class="showDetailsTr pagador">
                    <td>Cobrador</td>
                    <td><?php echo $nomeCobrador; ?></td>
                    <td><?php echo $sexoCobrador; ?></td>
                    <td><?php echo $cpfCobrador; ?></td>
                    <td><?php echo $dataPagamento; ?></td>
                </tr>
                <tr class="showDetailsTr conta">
                    <td>Dívida</td>
                    <td><?php echo $nomeConta; ?></td>
                    <td><?php echo $statusConta; ?></td>
                    <td><?php echo $valorConta; ?></td>
                    <td><?php echo $dataVencimento; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
</form>
</html>