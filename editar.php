<?php

    require_once("extensao/dao/database.class.php");
    include_once("extensao/dao/devedor/devedorDAO.class.php");
    include_once("extensao/dao/cobrador/cobradorDAO.class.php");
    include_once("extensao/dao/conta/contaDAO.class.php");
    $codigo = intval($_GET['usuario']);

    if(isset($_POST['submit'])) {
        
        $nomeDevedor = $_POST['nomeDevedor'];
        $cpfDevedor = $_POST['cpfDevedor'];
        $sexoDevedor = $_POST['sexoDevedor'];
        $dataCriacaoConta = $_POST['dataCriacaoConta'];
        
        $nomeCobrador = $_POST['nomeCobrador'];
        $cpfCobrador = $_POST['cpfCobrador'];
        $sexoCobrador = $_POST['sexoCobrador'];
        $dataPagamento = $_POST['dataPagamento'];

        $nomeConta = $_POST['nomeConta'];
        $valorConta = $_POST['valorConta'];
        $statusConta = $_POST['statusConta'];
        $dataVencimento = $_POST['dataVencimento'];
       
        $devedorDAO = new DevedorDAO();
        $fields = array("nomeDevedor", "cpfDevedor", "sexoDevedor", "dataCriacaoConta");
        $params = array($nomeDevedor, $cpfDevedor, $sexoDevedor, $dataCriacaoConta, $codigo);
        $where = "idDevedor = ?";
        $idDevedor = $devedorDAO->update($fields,$params,$where);
        var_dump($idDevedor);
        
        $cobradorDAO = new CobradorDAO();
        $fields = array("nomeCobrador", "cpfCobrador", "sexoCobrador", "dataPagamento");
        $params = array($nomeCobrador, $cpfCobrador, $sexoCobrador, $dataPagamento, $codigo);
        $where = "idCobrador = ?";
        $idCobrador = $cobradorDAO->update($fields,$params,$where);
        var_dump($idCobrador);  

        $contaDAO = new ContaDAO();
        $fields = array("nomeConta", "valorConta", "statusConta", "dataVencimento");
        $params = array($nomeConta, $valorConta, $statusConta, $dataVencimento, $codigo);
        $where = "idConta = ?";
        $rs = $contaDAO->update($fields,$params,$where);   
        var_dump($rs);
    
        echo "<script>
            window.location.href='index.php'
        </script>";
    }

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
    <title>Editar Dívida</title>
</head>
<body>
    <section id="smallContainer" class="container smallContainer">
        <form action="editar.php?usuario=<?php echo $codigo; ?>" method="post" id="form_edit">
            <a class="btns btnsExit" href="#smallContainer"></a>
            <div class="linha">
                <fieldset class="coluna">
                    <legend class="titulo">Cliente</legend>
                    <div class="inputBox">
                        <label for="nomeDevedor">Nome Completo :</label>
                        <input name="nomeDevedor" id="nomeDevedor" type="text" placeholder="Romário de Souza" required>
                    </div>
                    <div class="inputBox">
                        <label for="cpfDevedor">CPF :</label>
                        <input name="cpfDevedor" id="cpfDevedor" type="text" placeholder="000.000.000-00" required>
                    </div>
                    <div class="inputBox">
                        <label for="dataCriacaoConta">Data da geração da dívida :</label>
                        <input name="dataCriacaoConta" id="dataCriacaoConta" type="date" placeholder="01/01/2001" required>
                    </div>
                    <div class="inputBox">
                        <label>Gênero :</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="sexoDevedor" class="opcao__input" id="masculinoDevedor" value="Masculino" type="radio" checked>
                                <label class="opcao__label" for="masculinoDevedor">Masculino</label>
                            </div>
                            <div class="opcao">
                                <input name="sexoDevedor" class="opcao__input" id="femininoDevedor" value="Feminino" type="radio">
                                <label class="opcao__label" for="femininoDevedor">Feminino</label>
                            </div>
                        </div>
                    </div>
                </fieldset>    
                <fieldset class="coluna">
                    <legend class="titulo">Cobrador</legend>
                    <div class="inputBox">
                        <label for="nomeCobrador">Nome Completo :</label>
                        <input name="nomeCobrador" id="nomeCobrador" type="text" placeholder="José Roberto Gama" required>
                    </div>
                    <div class="inputBox">
                        <label for="cpfCobrador">CPF :</label>
                        <input name="cpfCobrador" id="cpfCobrador" type="text" placeholder="000.000.000-00" required>
                    </div>
                    <div class="inputBox">
                        <label for="dataPagamento">Data do pagamento da dívida :</label>
                        <input name="dataPagamento" id="dataPagamento" type="date" placeholder="01/01/2001" required>
                    </div>
                    <div class="inputBox">
                        <label>Gênero :</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="sexoCobrador" class="opcao__input" id="masculinoCobrador" value="Masculino" type="radio">
                                <label class="opcao__label" for="masculinoCobrador">Masculino</label>
                            </div>
                            <div class="opcao">
                                <input name="sexoCobrador" class="opcao__input" id="femininoCobrador" value="Feminino" type="radio" checked>
                                <label class="opcao__label" for="femininoCobrador">Feminino</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="coluna">
                    <legend class="titulo">Dívida</legend>
                    <div class="inputBox">
                        <label for="nomeConta">Nome da conta :</label>
                        <input name="nomeConta" id="nomeConta" type="text" placeholder="conta de luz" required>
                    </div>
                    <div class="inputBox">
                        <label for="valorConta">Valor da dívida(em reais) :</label>
                        <input name="valorConta" id="valorConta" type="number" placeholder="R$" required>
                    </div>
                    <div class="inputBox">
                        <label for="dataVencimento">Data de vencimento :</label>
                        <input name="dataVencimento" id="dataVencimento" type="date" required>
                    </div>
                    <div class="inputBox">
                        <label>Status</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="statusConta" class="opcao__input" id="paga" value="1" type="radio">
                                <label class="opcao__label" for="paga">Paga</label>
                            </div>
                            <div class="opcao">
                                <input name="statusConta" class="opcao__input" id="naopaga" value="0" type="radio" checked>
                                <label class="opcao__label" for="naopaga">Não paga</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            
            <input onclick="redir()" type="submit" class="submit-btn" name="submit" value="Enviar">
        </form>
    </section>
    <script src="extensao/js/index.js"></script>
</body>
</html>