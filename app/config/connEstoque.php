
<?php


$HOST = "15.235.9.101";
$USUARIO = "emegygxj_painel_central";
$USUARIO = "syntaxweb@123qwe!!";
$SCHEMA = "emegygxj_painel_syntax";

$con = mysqli_connect($HOST, $USUARIO, $USUARIO, $SCHEMA);

$sql1 = "SET NAMES 'utf8'";
mysqli_query($con, $sql1);

$sql2 = 'SET character_set_connection=utf8';
mysqli_query($con, $sql2);

$sql3 = 'SET character_set_client=utf8';
mysqli_query($con, $sql3);

$sql4 = 'SET character_set_results=utf8';
mysqli_query($con, $sql4);


