<?php
include '../../../config/conn.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';

if (!empty($nome)) {
    $query = "insert into categoria values(null, '{$nome}', 'a')";

    if (!mysqli_query($con, $query)) {
        header("Location: ../?tab=cadastrar&msg=Preencha as informações&Acao=1");
    }else{
        header("Location: ../?tab=cadastrar&msg=Categoria salva com sucesso!&Acao=0");
    }
} else {
    header("Location: ../?tab=cadastrar&msg=Preencha as informações&Acao=1");
}
