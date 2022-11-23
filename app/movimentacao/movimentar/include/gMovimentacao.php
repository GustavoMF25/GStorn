<?php

include "../../../config/conn.php";


$tipomovimentacao = isset($_POST['tipomovimentacao']) ? $_POST['tipomovimentacao'] : '';
$estoque = isset($_POST['estoque']) ? $_POST['estoque'] : '';
$produto = isset($_POST['produto']) ? $_POST['produto'] : '';
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
$custo = isset($_POST['custo']) ? $_POST['custo'] : '';
$venda = isset($_POST['venda']) ? $_POST['venda'] : '';

