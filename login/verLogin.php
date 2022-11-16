<?php


// require '../vendor/autoload.php';

//use \Ramsey\Uuid\Uuid;
//
//$myuuid = Uuid::uuid4();
//printf("Your UUID is: %s", $myuuid->toString());
//$senha = md5('Gf@2022**');
//$sqlUsuarioAdm = "insert into emegygxj_painel_syntax.usuariosistema(idusuariosistema,nome,email,login,senha) values('{$myuuid->toString()}', 'Gustavo Fernandes','gustavo.fernandes@syntaxweb.com.br','gustavo.fernandes','{$senha}')";
////echo $sqlUsuarioAdm;


session_start();
ob_start();

$email = $_POST["email"];
$senha = md5($_POST["password"]);

// if ($login == null || $senha == null) {
//     $msg = "Por favor, informe login e senha!";
//     header("location:./?msg=" . $msg);
// } else {
include '../app/config/connSistema.php';
$sql = "
            select 
                u.idusuario,
                u.nome,
                u.login,
                u.telefone,
                u.dtnasc,
                u.email,
                u.sexo,
                u.status as 'status'
            from usuariosistema u
            where u.email = '$login'
            and u.senha = '$senha'
    ";
$result = mysqli_query($conSis, $sql);
// if (mysqli_num_rows($result)) {
//     $row = mysqli_fetch_array($result);
//     //Verifica se esta inativo
//     if ($row[7] == 'i') {
//         session_destroy();
//         $msg = "Seu perfil esta inativo :(";
//         header("location:./index?msg=" . $msg);
//     }
//Verifica se esta travado
//        if ($row[12] == 't') {
//            session_destroy();
//            $msg = "Seu perfil esta travado, entre em contato com a administração!";
//            header("location:./index?msg=" . $msg);
//        }

//Verifica se esta ativo ou pendente
// if ($row[7] == 'a' || $row[7] == 'p') {
//    $_SESSION["idusuario"] = $row["idusuario"];
//    $_SESSION["nome"] = $row["nome"];
//    $_SESSION["login"] = $row["login"];
//    $_SESSION["sexo"] = $row["sexo"];
//    $_SESSION["email"] = $row["email"];
//    $_SESSION["dtnasc"] = $row["dtnasc"];
//    $_SESSION["perfil"] = $row["perfil"];
//    $_SESSION["status"] = $row["status"];
$_SESSION['idusuario'] = 1;
$_SESSION['nome'] = 'Gustavo Fernandes';
$_SESSION['login'] = 'gustavo.fernandes';
$_SESSION['email'] = 'gustavo.fernandes@gstorn.com.br';
//            $_SESSION["tempo"] = time();
//            $sesseionId = session_id();
//            $hoje = date("Y-m-d");
//            $agora = date("H:i:s");
//            $insertSessao = "insert into sessao values(null, {$_SESSION['idusuario']}, '{$sesseionId}', '{$hoje}', '{$agora}')";
//            mysqli_query($con, $insertSessao);
header("location:../app/permissionamento.php");
        // }
//     } else {
//         $msg = "Login ou senha inválido(s)";
//         header("location:./index?msg=" . $msg);
//     }
// }