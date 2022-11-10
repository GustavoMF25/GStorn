<?php

$idusuario = $_SESSION['idusuario'];
$tempDiretorio = array_reverse(explode("/", getcwd()));
$arquivoAtual = basename($_SERVER['PHP_SELF']); //Arquivo Atual

$diretorioModulo = substr($tempDiretorio[1], -1) == '/' ? $tempDiretorio[1] : $tempDiretorio[1] . "/"; //Diretório do módulo
$diretorioTela =  substr($tempDiretorio[0], -1) == '/' ? $tempDiretorio[0] : $tempDiretorio[0] . "/";

if ($tempDiretorio[0] == 'app') {
    $idmodulo = $_GET['id'];

    $sqlmodulo = "select idmodulo,
                     nome,
                     icone,
                     status
                 from emegygxj_painel_sintax.modulo
               where idmodulo = $idmodulo";
    $resultmodulo = mysqli_query($con, $sqlmodulo);
    $rowmodulo = mysqli_fetch_array($resultmodulo);

    $nomemodulo = $rowmodulo[1];
    $iconemodulo = $rowmodulo[2];
} else {
    //Dados da tela atual e seu módulo
    $sqltelamodulo = "select t.idtela,
                             t.nome,
                             t.icone,
                             t.status,
                             m.idmodulo,
                             m.nome,
                             m.icone,
                             m.status
                        from tela t
                        inner join emegygxj_painel_sintax.modulo m on (m.idmodulo = t.idmodulo)
                     where m.url = '$diretorioModulo'
                     and t.url = '$diretorioTela'";
    $resulttelamodulo = mysqli_query($con, $sqltelamodulo);
    $rowtelamodulo = mysqli_fetch_array($resulttelamodulo);

    //Tela
    $idtela = $rowtelamodulo[0];
    $nometela = $rowtelamodulo[1];
    $iconetela = $rowtelamodulo[2];
    $statustela = $rowtelamodulo[3];

    //Módulo        
    $idmodulo = $rowtelamodulo[4];
    $nomemodulo = $rowtelamodulo[5];
    $iconemodulo = $rowtelamodulo[6];
    $statusmodulo = $rowtelamodulo[7];
}