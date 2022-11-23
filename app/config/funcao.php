<?php
function LogSistema($con, $acao, $descricao, $usuario)
{
    $data = date('Y-m-d');
    $hora = date('H:i:s');

    $query = "insert into logalteracao(acao,descricao,idusuario,data,hora) values ('{$acao}','{$descricao}',{$usuario},'{$data}', '{$hora}')";
    mysqli_query($con, $query);
}


function movimentarProduto($con, $tipo, $precusto, $prevenda, $quantidade, $produto, $estoque)
{
    $precusto = isset($precusto) ? $precusto : 'null';
    $prevenda = isset($prevenda) ? $prevenda : 'null';
    $estoque = isset($estoque) ? $estoque : 'null';

    $data = date('Y-m-d');
    $hora = date('H:i:s');
    $queryMov = "insert into movimentacao(
                                            idusuario,
                                            idproduto,
                                            idestoque,
                                            tipo,
                                            precusto,
                                            prevenda,
                                            quantidade,
                                            criado_data,
                                            criado_hora
                                        ) values (
                                            {$_SESSION['idusuario']},
                                            {$produto},
                                            {$estoque},
                                            '{$tipo}',
                                            {$precusto},
                                            {$prevenda},
                                            {$quantidade},
                                            '{$data}',
                                            '{$hora}'
                                        )";

    mysqli_query($con, $queryMov);
}
