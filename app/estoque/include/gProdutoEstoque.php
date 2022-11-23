<?php
include '../../config/config.php';
include '../../config/conn.php';
include '../../config/funcao.php';

$estoque = isset($_POST['estoque']) ?  $_POST['estoque'] : '';
$produto = isset($_POST['produto']) ? $_POST['produto'] : '';
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
$data = date('Y-m-d');
$hora = date('H:i:s');

$response = [];

for ($cont = 1; $cont <= $quantidade; $cont++) {


    $queryInsert = "insert into produtoestoque(idestoque, idproduto, status, criado_data, criado_hora) values ({$estoque}, {$produto}, 'a', '{$data}','{$hora}')";
    if (mysqli_query($con, $queryInsert)) {
        $response = ['msg' => "Produto registrado no estoque!", "acao" => 0];
    } else {
        $response = ['msg' => "Erro ao registrar o produto no estoque!", "acao" => 1];
    }
}
movimentarProduto($con, 'entrada', null, null, $quantidade, $produto, $estoque);


header("Location: ../?msg={$response['msg']}&acao={$response['acao']}&tab=cadastrar-tab");
