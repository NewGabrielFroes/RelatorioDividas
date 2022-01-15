<?php
    include ("conexao.php");

    $sql_code = "SELECT * FROM conta";
    $sql_query = $conn -> query($sql_code) or die($conn -> error);

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

        $pagador = mysqli_query($conn, "INSERT INTO pagador(nome_pagador, cpf_pagador, sexo_pagador, data_pagamento) 
        VALUES ('$nome_Pagador','$cpf_Pagador','$sexo_Pagador','$data_Pagamento')");

        $conta = mysqli_query($conn, "INSERT INTO conta(nome_conta, valor_conta, status_conta, data_vencimento, nome_gastador, nome_pagador) 
        VALUES ('$nome_Conta','$valor_Conta','$status','$data_Vencimento', '$nome_Gastador', '$nome_Pagador')");

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
    <link rel="stylesheet" href="css/table.css">
    <title>Tabela de dívidas</title>
</head>
<body>
    <section id="smallContainer" class="container smallContainer">
        <a href="#form_edit" class="btn btn-dark btnsEditAdd btnsAdd"><i class="bi bi-plus-circle"></i> Adicionar dívida</a>
        
        <table>
            <thead>
               <tr>
                    <th>STATUS</th>
                    <th>NOME</th>
                    <th>DÍVIDA</th>
                    <th>VALOR</th>
                    <th>DATA</th>
                    <th>PAGADOR</th>
                </tr>
            </thead>
            <tbody>
                <?php while($valor = $sql_query -> fetch_array() ) { ?>
                <tr>
                    <td><?php if($valor["status_conta"]) {echo "Paga";} else {echo "Não paga";} ?></td>
                    <td><?php echo $valor["nome_gastador"]; ?></td>
                    <td><?php echo $valor["nome_conta"]; ?></td>
                    <td><?php echo "R$ ". str_replace(".", ",", number_format($valor["valor_conta"], 2)); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($valor["data_vencimento"])); ?></td>
                    <td><?php echo $valor["nome_pagador"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <form action="index.php" method="post" class="formInactive" id="form_edit">
        <a class="btns btnsExit" href="#smallContainer"><i class="bi bi-x-circle"></i></a>
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
                            <input name="sexo" class="opcao__input" id="masculino" value="masculino" type="radio" checked>
                            <label class="opcao__label" for="masculino">Masculino</label>
                        </div>
                        <div class="opcao">
                            <input name="sexo" class="opcao__input" id="feminino" value="feminino" type="radio">
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
                            <input name="sexo_Pagador" class="opcao__input" id="masculinoCobrador" value="masculino" type="radio">
                            <label class="opcao__label" for="masculinoCobrador">Masculino</label>
                        </div>
                        <div class="opcao">
                            <input name="sexo_Pagador" class="opcao__input" id="femininoCobrador" value="feminino" type="radio" checked>
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
                            <input name="status" class="opcao__input" id="paga" value="paga" type="radio">
                            <label class="opcao__label" for="paga">Paga</label>
                        </div>
                        <div class="opcao">
                            <input name="status" class="opcao__input" id="naopaga" value="naopaga" type="radio" checked>
                            <label class="opcao__label" for="naopaga">Não paga</label>
                        </div>
                    </div>
                </div> 
            </fieldset>
        </div>
        <input type="submit" class="submit-btn" name="submit" value="Enviar">
        </form>
    </section>
</body>
<script src="js/index.js"></script>