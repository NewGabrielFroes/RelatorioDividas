<?php

    include("conexao.php");

    if (isset($_POST['submit'])) {
    
        $nome_Gastador = $_POST['nome_Gastador'];
        $cpf_Gastador = $_POST['cpf_Gastador'];
        $data_Criacao_Conta = $_POST['data_Criacao_Conta'];
        $sexo = $_POST['sexo'];

        $nome_Pagador = $_POST['nome_Pagador'];
        $cpf_Pagador = $_POST['cpf_Pagador'];
        $data_Pagamento = $_POST['data_Pagamento'];
        $sexo_Pagador = $_POST['sexo_Pagador'];

        $nome_Conta = $_POST['nome_Conta'];
        $valor_Conta = $_POST['valor_Conta'];
        $data_Vencimento = $_POST['data_Vencimento'];
        $status = $_POST['status'];

        $gastador = mysqli_query($conn, "INSERT INTO gastador(nome_Gastador, cpf_gastador, sexo_gastador, data_criacao_conta) 
        VALUES ('$nome_Gastador', '$cpf_Gastador', '$sexo', '$data_Criacao_Conta')");
        $id_Gastador = mysqli_insert_id($conn);

        $pagador = mysqli_query($conn, "INSERT INTO pagador(nome_pagador, cpf_pagador, sexo_pagador, data_pagamento) 
        VALUES ('$nome_Pagador','$cpf_Pagador','$sexo_Pagador','$data_Pagamento')");
        $id_Pagador = mysqli_insert_id($conn);

        $conta = mysqli_query($conn, "INSERT INTO conta(nome_conta, valor_conta, status_conta, data_vencimento, id_gastador, id_pagador) 
        VALUES ('$nome_Conta','$valor_Conta','$status','$data_Vencimento', '$id_Gastador', '$id_Pagador')");

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
    <title>Tabela de dívidas</title>
</head>
<body>
    <section id="smallContainer" class="container smallContainer">
        <form action="adicionar.php" method="post" id="form_edit">
            <a class="btns btnsExit" href="#smallContainer"></a>
            <div class="linha">
                <fieldset class="coluna">
                    <legend class="titulo">Cliente</legend>
                    <div class="inputBox">
                        <label for="nome_Gastador">Nome Completo :</label>
                        <input name="nome_Gastador" id="nome_Gastador" type="text" placeholder="Romário de Souza" required>
                    </div>
                    <div class="inputBox">
                        <label for="cpf_Gastador">CPF :</label>
                        <input name="cpf_Gastador" id="cpf_Gastador" type="text" placeholder="000.000.000-00" required>
                    </div>
                    <div class="inputBox">
                        <label for="data_Criacao_Conta">Data da geração da dívida :</label>
                        <input name="data_Criacao_Conta" id="data_Criacao_Conta" type="date" placeholder="01/01/2001" required>
                    </div>
                    <div class="inputBox">
                        <label>Gênero :</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="sexo" class="opcao__input" id="masculino" value="Masculino" type="radio" checked>
                                <label class="opcao__label" for="masculino">Masculino</label>
                            </div>
                            <div class="opcao">
                                <input name="sexo" class="opcao__input" id="feminino" value="Feminino" type="radio">
                                <label class="opcao__label" for="feminino">Feminino</label>
                            </div>
                        </div>
                    </div>
                </fieldset>    
                <fieldset class="coluna">
                    <legend class="titulo">Cobrador</legend>
                    <div class="inputBox">
                        <label for="nome_Pagador">Nome Completo :</label>
                        <input name="nome_Pagador" id="nome_Pagador" type="text" placeholder="José Roberto Gama" required>
                    </div>
                    <div class="inputBox">
                        <label for="cpf_Pagador">CPF :</label>
                        <input name="cpf_Pagador" id="cpf_Pagador" type="text" placeholder="000.000.000-00" required>
                    </div>
                    <div class="inputBox">
                        <label for="data_Pagamento">Data do pagamento da dívida :</label>
                        <input name="data_Pagamento" id="data_Pagamento" type="date" placeholder="01/01/2001" required>
                    </div>
                    <div class="inputBox">
                        <label>Gênero :</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="sexo_Pagador" class="opcao__input" id="masculinoCobrador" value="Masculino" type="radio">
                                <label class="opcao__label" for="masculinoCobrador">Masculino</label>
                            </div>
                            <div class="opcao">
                                <input name="sexo_Pagador" class="opcao__input" id="femininoCobrador" value="Feminino" type="radio" checked>
                                <label class="opcao__label" for="femininoCobrador">Feminino</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="coluna">
                    <legend class="titulo">Dívida</legend>
                    <div class="inputBox">
                        <label for="nome_Conta">Nome da conta :</label>
                        <input name="nome_Conta" id="nome_Conta" type="text" placeholder="conta de luz" required>
                    </div>
                    <div class="inputBox">
                        <label for="valor_Conta">Valor da dívida(em reais) :</label>
                        <input name="valor_Conta" id="valor_Conta" type="number" placeholder="R$" required>
                    </div>
                    <div class="inputBox">
                        <label for="data_Vencimento">Data de vencimento :</label>
                        <input name="data_Vencimento" id="data_Vencimento" type="date" required>
                    </div>
                    <div class="inputBox">
                        <label>Status</label>
                        <div class="opcoes">
                            <div class="opcao">
                                <input name="status" class="opcao__input" id="paga" value="1" type="radio">
                                <label class="opcao__label" for="paga">Paga</label>
                            </div>
                            <div class="opcao">
                                <input name="status" class="opcao__input" id="naopaga" value="0" type="radio" checked>
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