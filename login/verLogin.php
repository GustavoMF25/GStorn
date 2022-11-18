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

$login = $_POST["login"];
$senha = $_POST["password"];

if ($login == null || $senha == null) {
    $msg = "Por favor, informe login e senha!";
    header("location: ../?msg=" . $msg);
} else {
    include '../app/config/conn.php';
    $sql = "
            select 
                u.id,
                u.nome,
                u.login,
                u.email,
                u.senha,
                u.perfil,
                u.status as 'status'
            from usuario u
            where u.login = '$login'
    ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);
        //     //Verifica se esta inativo
        if ($row[6] == 'i') {
            session_destroy();
            $msg = "Seu perfil esta inativo :(";
            header("location: ../index?msg=" . $msg);
        }
        //Verifica se esta travado

        if (password_verify($senha, $row[4])) {
            //Verifica se esta ativo ou pendente

            $_SESSION['idusuario'] = $row[0];
            $_SESSION['nome'] = $row[1];
            $_SESSION['login'] = $row[2];
            $_SESSION['email'] = $row[3];
            $_SESSION['tipoperfil'] = $row[5];
            $_SESSION["tempo"] = time();
            $sesseionId = session_id();
            $hoje = date("Y-m-d");
            $agora = date("H:i:s");
            //    $insertSessao = "insert into sessao values(null, {$_SESSION['idusuario']}, '{$sesseionId}', '{$hoje}', '{$agora}')";
            //            mysqli_query($con, $insertSessao);
            header("location:../app/permissionamento.php");
        } else {
            $msg = "<i class='fa fa-frown-o' aria-hidden='true'></i> <br> Senha incorreta!";
            header("location: ../index?msg=" . $msg);
        }
    } else {
        $msg = "Login ou senha inválido(s)";
        header("location: ../index?msg=" . $msg);
    }
}
