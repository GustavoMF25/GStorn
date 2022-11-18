<?php
include '../../../config/config.php';
include '../../../config/conn.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';


if (!empty($nome)) {
    $query = "insert into categoria values(null, '{$nome}', {$_SESSION['idusuario']}, 'a')";

    if (!mysqli_query($con, $query)) {
        header("Location: ../?tab=cadastrar&msg=Erro ao realizar o cadastro&acao=1");
    } else {
        header("Location: ../?tab=cadastrar&msg=Categoria salva com sucesso!&acao=0");
    }
} else {
    header("Location: ../?tab=cadastrar&msg=Preencha as informações&acao=1");
}
