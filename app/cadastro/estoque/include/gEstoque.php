<?php
include '../../../config/config.php';
include '../../../config/conn.php';
include '../../../config/funcao.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
$quantidademaxima = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';


$response = [];
$data = date('Y-m-d');
$hora = date('H:i:s');

if (!empty($nome)) {
    $query = "insert into estoque(
                            nome,
                            descricao,
                            quantidademaxima,
                            status,
                            criado_data,
                            criado_hora,
                            idusuario
                            ) values(
                            '{$nome}',
                            '{$descricao}',
                            {$quantidademaxima},
                            'a',
                            '{$data}',
                            '{$hora}',
                            {$_SESSION['idusuario']}
                            )";

    echo $query;
    if (!mysqli_query($con, $query)) {
        $response = ['msg' => "Erro ao realizar o cadastro do estoque \"$nome\" ", "acao" => 1];
        // header("Location: ../?tab=cadastrar&msg=Erro ao realizar o cadastro&acao=1");
    } else {
        $response = ['msg' => "Estoque \"$nome\" salva com sucesso!", "acao" => 0];
    }
    LogSistema($con, 'CadastroEstoque', $response['msg'], $_SESSION['idusuario']);
} else {
    $response = ['msg' => "Preencha as informações", "acao" => 1];
}

header("Location: ../?msg={$response['msg']}&acao={$response['acao']}&tab=cadastrar-tab");
