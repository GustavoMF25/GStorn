<?php
include '../../../config/config.php';
include '../../../config/conn.php';

$nome = mysqli_real_escape_string($con, trim($_POST['nome']));
$email = mysqli_real_escape_string($con, trim($_POST['email']));
$login = mysqli_real_escape_string($con, trim($_POST['login']));
$senha = mysqli_real_escape_string($con, trim($_POST['senha']));
$tipodeusuario = mysqli_real_escape_string($con, trim($_POST['tipodeusuario']));

$response = [];

$data = date('Y-m-d');
$hora = date('H:i:s');
$password = password_hash($senha, PASSWORD_DEFAULT);

$sqlConfereEmail = "select 1
                        from usuario
                    where email = '$email'";
$resultConfereEmail = mysqli_query($con, $sqlConfereEmail);

$sqlConfereLogin = "select 1 
                       from usuario 
                    where login = '$login'";
$resultConfereLogin = mysqli_query($con, $sqlConfereLogin);

if (empty($login) || empty($nome) || empty($email) || empty($senha)) {
    $response = ['msg' => "Preencha todos os campos corretamente!", "acao" => 1];
} elseif (mysqli_num_rows($resultConfereEmail) > 0) {
    $response = ['msg' => "O e-mail \"$email\" já está sendo utilizado!", "acao" => 1];
} elseif (mysqli_num_rows($resultConfereLogin) > 0) {
    $response = ['msg' => "O login \"$login\" já está sendo utilizado!", "acao" => 1];
} else {

    $sqlUsuario = "insert into usuario values (null,
                                               '{$nome}',
                                               '{$email}',
                                               '{$login}',
                                               '{$password}',
                                               'a',
                                               '',
                                               '{$tipodeusuario}',
                                               '$data',
                                               '$hora')";
    if (mysqli_query($con, $sqlUsuario)) {
        $response= ['msg' => "Usuário \"$nome\" cadastrado com sucesso!", "acao" => 0];
    } else {
        $response = ['msg' => "Falha ao registrar o usuário \"$nome\".", "acao" => 1];
    }
}



mysqli_close($con);
header("Location: ../?msg={$response['msg']}&acao={$response['acao']}&tab=cadastrar-tab");
