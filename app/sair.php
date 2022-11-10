<?php
include './config/config.php';
include './config/connMysql.php';
// apaga sessão
$sesseionId = session_id();
$deleteSessao = "delete from sessao where idusuario = {$_SESSION['idusuario']} ";
mysqli_query($con, $deleteSessao);
mysqli_close($con);
session_start();
session_destroy();

$msg = "Logout efetuado!";
header("location:../index?msg=" . $msg);
