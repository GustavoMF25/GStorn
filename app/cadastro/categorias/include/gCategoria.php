<?php
include '../../../config/config.php';
include '../../../config/conn.php';
include '../../../config/funcao.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$response = [];

if (!empty($nome)) {
    $query = "insert into categoria values(null, {$_SESSION['idusuario']}, '{$nome}', 'a')";


    if (!mysqli_query($con, $query)) {
        $response = ['msg' => "Erro ao realizar o cadastro da categoria \"$nome\" ", "acao" => 1];
        // header("Location: ../?tab=cadastrar&msg=Erro ao realizar o cadastro&acao=1");
    } else {
        $response = ['msg' => "Categoria \"$nome\" salva com sucesso!", "acao" => 0];
    }
    LogSistema($con, 'CadastroCategoria', $response['msg'], $_SESSION['idusuario']);
} else {
    $response = ['msg' => "Preencha as informações", "acao" => 1];
}

header("Location: ../?msg={$response['msg']}&acao={$response['acao']}&tab=cadastrar-tab");