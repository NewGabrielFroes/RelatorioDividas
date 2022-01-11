<?php

    include("conexao.php");

    ///////////////////
    ////ADICIONAR//////
    ///////////////////

    if (isset($_POST['btnAdicionar'])) {
   
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

    ///////////////////
    ////EDITAR/////////
    /////////////////// 

    else if (isset($_POST['btnEditar'])) {
        
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

        $gastador = mysqli_query($conn, "UPDATE gastador
        SET nome_Gastador = '$nome_Gastador',
            cpf_gastador = '$cpf_Gastador',
            sexo_gastador = '$sexo',
            data_criacao_conta = '$data_Criacao_Conta'
        WHERE coluna de variaveis unicas = identidade;");  //SQL

        $pagador = mysqli_query($conn, "UPDATE pagador
        SET nome_pagador = '$nome_Pagador',
            cpf_pagador = '$cpf_Pagador',
            sexo_pagador = '$sexo_Pagador',
            data_pagamento = '$data_Pagamento'
        WHERE coluna de variaveis unicas = identidade;");  //SQL

        $conta = mysqli_query($conn, "UPDATE conta
        SET nome_conta = '$nome_Conta',
            valor_conta = '$valor_Conta',
            data_vencimento = '$data_Vencimento',
            status_conta = '$status',
            nome_gastador = '$nome_Gastador',
            nome_pagador = '$nome_Pagador'
        WHERE coluna de variaveis unicas = identidade;");  //SQL

    }

    else if (isset($_POST['action'])) {
        if ($_POST['action'] == 'delete') {
            ///////////////////
            ////EXCLUIR////////
            /////////////////// 
        }
        else if (($_POST['action'] == 'details')) {
            ///////////////////
            ////MOSTAR/////////
            /////////////////// 
        }
    }



    //HTML


    



    //HTML

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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Tabela de dívidas</title>
</head>
<body>
    <section id="smallContainer" class="container smallContainer">
        <a href="#form_edit" class="btn btn-dark btnsEditAdd btnsAdd"><i class="bi bi-plus-circle"></i> Adicionar dívida</a>
        <!-- 
        ///////////////////
        ////TABELA/////////
        /////////////////// 
        -->
        
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
                <tr>
                    <td>Paga</td>
                    <td>Rafael Juninho</td>
                    <td>Cartão de crédito</span></td>
                    <td>252,20R$</td>
                    <td>20/02/2022</td>
                    <td>João Moreira</td>
                    <td scope="row" colspan="3">
                        <span class="btn-group">
                            <a href="#form_edit" class="btns btnsEditAdd btnsEdit"><i class="bi bi-pencil-fill"></i> </a>
                        </span>
                        <span class="btn-group">
                            <a value="delete" class="btns btnsDelete"><i class="bi bi-trash-fill"></i></a>
                        </span>
                        <span class="btn-group">
                            <a value="showDetails" href="#showDetailsContainer0" class="btns btnsShowDetails"><i class="bi bi-eye-fill"></i></a>
                        </span>
                    </td> -->
                </tr>
            </tbody>
        </table>

        <!-- 
        ///////////////////
        ////FORMULÁRIO/////
        /////////////////// 
        -->

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

    <!-- 
    ///////////////////
    ////+DETALHES//////
    /////////////////// 
    -->

    <section id="showDetails" class="container showDetails">
        <a class="btns btnsExitDetails" href="#smallContainer"><i class="bi bi-x-circle"></i></a>
            <table class="tableShowDetails">
                <thead class="showDetailsThead">
                    <tr class="showDetailsTr">
                    </tr>
                </thead>
                <tbody id="showDetailsContainer0" class="showDetailsContainer showDetailsContainer0 showDetailsInactive">
                    <tr class="showDetailsTr">
                        <td>Gastador</td>
                        <!-- <td>Rafael Juninho</td>
                        <td>20/02/2022</td>
                        <td>Masculino</td>
                        <td>789.456.623-29</td> -->
                    </tr>
                    <tr class="showDetailsTr pagador">
                        <td>Pagador</td>
                        <!-- <td>João Moreira</td>
                        <td>28/02/2022</td>
                        <td>Masculino</td>
                        <td>879.465.632-92</td> -->
                    </tr>
                    <tr class="showDetailsTr conta">
                        <td>Conta</td>
                        <!-- <td>Cartão de crédito</td>
                        <td>Paga</td>
                        <td>17/03/2022</td>
                        <td>252,20R$</td> -->
                    </tr>
                </tbody>
                <tbody id="showDetailsContainer1" class="showDetailsContainer showDetailsContainer1 showDetailsInactive">
                    <tr class="showDetailsTr">
                        <td>Gastador</td>
                        <!-- <td>Marina Luana Marcela Lima</td>
                        <td>18/05/2022	</td>
                        <td>Feminino</td>
                        <td>456.789.623-29</td> -->
                    </tr>
                    <tr class="showDetailsTr pagador">
                        <td>Pagador</td>
                        <!-- <td>Maria Francisca</td>
                        <td>20/05/2022</td>
                        <td>Feminino</td>
                        <td>326.465.632-92</td> -->
                    </tr>
                    <tr class="showDetailsTr conta">
                        <td>Conta</td>
                        <!-- <td>Mensalidade da faculdade</td>
                        <td>Paga</td>
                        <td>20/05/2022</td>
                        <td>445,20R$</td> -->
                    </tr>
                </tbody>
            </table>
        </section>
    </style>
<script src="index.js"></script>
</body>
</html>
