<?php
    
    require_once("extensao/dao/database.class.php");
    include_once("extensao/dao/devedor/devedorDAO.class.php");
    include_once("extensao/dao/cobrador/cobradorDAO.class.php");
    include_once("extensao/dao/conta/contaDAO.class.php");

    $codigo = intval($_GET['usuario']);
    $devedorDAO = new DevedorDAO();
    $cobradorDAO = new CobradorDAO();
    $contaDAO = new ContaDAO();

    $where = "idDevedor = ?";
    $params = array($codigo);
    $rs = $devedorDAO->delete($where,$params);
    var_dump($rs);

    $where = "idCobrador = ?";
    $params = array($codigo);
    $rs = $cobradorDAO->delete($where,$params);
    var_dump($rs);

    $where = "idConta = ?";
    $params = array($codigo);
    $rsConta = $contaDAO->delete($where,$params);
    var_dump($rs);

    echo "
        <script>
            location.href = 'index.php';
        </script>";

