<?php

//include_once '../vendor/autoload.php';
include_once './config/conn.php';

session_start();
$nomeusuario = $_SESSION['nomesobrenome'];
$ipcolaborador = $_SESSION['ip'];
$idusuario = $_SESSION['idusuario'];
$agora = date('Y-m-d H:i:s');

//$select_ultimoAcesso = "select 
//                            case when max(data) is not null 
//                                then max(data) 
//                                else now() 
//                            end as data 
//                            from logacesso where login = {$idusuario}";
//
//$ultimoAcesso = mysqli_query($con, $select_ultimoAcesso);
//$retorno = mysqli_fetch_array($ultimoAcesso);
//$_SESSION['ultimoAcesso'] = $retorno[0];
//
//$sqlLogAcesso = "insert into logacesso values(
//                                            null,
//                                            {$idusuario},
//                                            '{$agora}')";
//mysqli_query($con, $sqlLogAcesso);
//$permissoes = array();
//$select_permissoes = "select 
//                            p.idaplicacao f
//                    from permissao p 
//                    left join grupo g 
//                            on g.idgrupo = p.idgrupo 
//                    left join usuariogrupo ug 
//                            on ug.idgrupo = g.idgrupo 
//                    where p.idusuario = {$idusuario} or (ug.idusuario = {$idusuario} and g.situacao = '1') group by p.idaplicacao";
//
//$mysql_permissoes = mysqli_query($con, $select_permissoes);
//while ($permisao = mysqli_fetch_array($mysql_permissoes)) {
//    $permissoes[] = $permisao[0];
//}
//$_SESSION['permissao'] = $permissoes;

$protocolo = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === false) ? 'http' : 'https';
$host = $_SERVER['HTTP_HOST'];
$UrlAtual = $protocolo . '://' . $host;
$url = $UrlAtual;

$select_foto = "select foto from usuario where idusuario = " . $idusuario;
$mysql_foto = mysqli_query($con, $select_foto);
$foto = mysqli_fetch_array($mysql_foto);

if ($foto[0] <> "") {
    $_SESSION['perfil']['foto'] = $url . "/app/perfil" . $foto['foto'];
}
//else {
//    $_SESSION['perfil']['foto'] = $url . "/assets/images/gedoc/perfil.png";
//}

//$select_acessos = "select 
//                        count(idlogacesso) 
//                   from logacesso
//                        where `nomeusuario` = '" . $nomeusuario . "'  
//                        and `clienteid` = '" . $cliente . "' 
//                        and `created_at` > NOW() - INTERVAL 15 DAY;";
//$mysql_acessos = mysqli_query($con, $select_acessos);
//$qtdAcesso = mysqli_fetch_array($mysql_acessos);
//$sesseionId = session_id();
//$dia = date("Y-m-d H:i:s");
//$insert_sessao = "insert into sessao values(null, {$_SESSION['idusuario']}, '{$sesseionId}', '{$dia}', '{$dia}')";
////$result_ip_session = "update sessao set datafim = '{$dia}', phpsessionid = '{$sesseionId}' where idusuario = {$_SESSION['idusuario']}";
//mysqli_query($con, $insert_sessao);
mysqli_close($con);
//if ($qtdAcesso[0] == 1) {
//    header("Location: ./primeiroAcesso/");
header("Location: ./dashboard/");
//} else {
//    header("Location: ./index");
//}
