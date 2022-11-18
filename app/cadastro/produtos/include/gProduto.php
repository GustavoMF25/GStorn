<?php
include '../../../config/config.php';
include '../../../config/conn.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$custo = isset($_POST['custo']) ? $_POST['custo'] : '';
$venda = isset($_POST['venda']) ? $_POST['venda'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$fornecedor = isset($_POST['fornecedor']) ? $_POST['fornecedor'] : '';
$data = date('Y-m-d');
$hora = date('H:i:s');
$response = [];

if (!empty($nome)) {
    try {
        $query = "insert into produto (
                                    nome,
                                    codigo,
                                    custo,
                                    venda,
                                    idcategoria,
                                    descricao,
                                    idfornecedor,
                                    criado_data,
                                    criado_hora,
                                    idusuario,
                                    status
                                ) values (
                                    '{$nome}',
                                    '{$codigo}',
                                    '{$custo}',
                                    '{$venda}',
                                    {$categoria},
                                    '{$descricao}',
                                    '{$fornecedor}',
                                    '{$data}',
                                    '{$hora}',
                                    {$_SESSION['idusuario']},
                                    'a'
                                )";

        if (!mysqli_query($con, $query)) {
            $response = ['msg' => "Falha ao registrar o produto \"$nome\" ", "acao" => 1];
        } else {
            $response = ['msg' => "Produto \"$nome\" cadastrado com sucesso!", "acao" => 0];
        }
    } catch (Exception $e) {
        print_r($e);
    }
} else {
    $response = ['msg' => "Preencha todos os campos corretamente!", "acao" => 1];
}

mysqli_close($con);
header("Location: ../?msg={$response['msg']}&acao={$response['acao']}&tab=cadastrar-tab");