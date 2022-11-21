<?php
function LogSistema($con, $acao, $descricao, $usuario)
{
    $data = date('Y-m-d');
    $hora = date('H:i:s');

    $query = "insert into logalteracao(acao,descricao,idusuario,data,hora) values ('{$acao}','{$descricao}',{$usuario},'{$data}', '{$hora}')";
    mysqli_query($con, $query);
}
