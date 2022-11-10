<?php

/* ARQUIVO DE CONFIGURAÇÂO GERAL DO SISTEMA */
session_cache_expire(10);
session_start();

// Padrão brasileiro
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//DOMAIN = dominio Ex:.. syntaxweb
define('DOMAIN', isset($_SERVER['HTTP_Host']) ? $_SERVER['HTTP_Host'] : $_SERVER['SERVER_NAME']);

function pathUrl($tempDir = __DIR__) {
    $root = "";
    $dir = str_replace('\\', '/', realpath($tempDir));

    //HTTPS OU HTTP
    $root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    //Host
    $root .= '://' . $_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['CONTEXT_PREFIX'])) {
        $root .= $_SERVER['CONTEXT_PREFIX'];
        $root .= substr($dir, strlen($_SERVER['CONTEXT_DOCUMENT_ROOT']));
    } else {
        $root .= substr($dir, strlen($_SERVER['DOCUMENT_ROOT']));
    }
    $root .= '/';
    return $root;
}

$tempBase = array_reverse(explode('/', pathUrl()));

//https://painel.syntaxweb.com.br/app
unset($tempBase[0], $tempBase[1]);
$based = array_reverse($tempBase);
define('BASED', implode('/', $based));

//https://painel.syntaxweb.com.br
unset($tempBase[2]);
$base = array_reverse($tempBase);
define('BASE', implode('/', $base));

//Valida a Sessão
//if (!isset($_SESSION['idusuario'])) {
//    $text = "Necessário realizar login para continuar";
//    header("Location: " . BASE . "/index.php?msg=$text&acao=1");
//} 
//elseif ($_SESSION["tempo"] + 60 * 60 < time()) {
//    session_destroy();
//    $text = "Sessão expirada";
//    header("Location: " . BASE . "/index.php?msg=$text&acao=1");
//} else {
//    $_SESSION["tempo"] = time();
//}
//
