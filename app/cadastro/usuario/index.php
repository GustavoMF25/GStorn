<?php
include '../../config/config.php';
include '../../config/conn.php';

$tabs = isset($_GET['tab']) ? $_GET['tab'] : 'gerenciar';

// function ativaTab($tab)
// { //"0" é o valor padrão para tab principal
//     if (isset($_GET['tab']) and $_GET['tab'] == $tab) {
//         return "active";
//     } elseif (
//         $tab == "0"
//         and !isset($_GET['tab'])
//     ) {
//         return "active";
//     }
// }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GStorn - Usuario</title>

    <link rel="icon" href="<?= BASE ?>/assets/images/logoGStor.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= BASED ?>/assets/css/main.css">

    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css">


    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/select2/css/select2.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.select2').select2({});

            mudaTabs('<?= $tabs ?>')
            // BASICO DATATABLE
            $("#table-usuario").DataTable({
                "dom": 'rtip',
                "responsive": false,
                "searching": false,
                "info": false,
                "language": {
                    "paginate": {
                        "next": "Próximo",
                        "previous": "Anterior",
                        "first": "Primeiro",
                        "last": "Último"
                    },
                }
            })
        })



        function mudaTabs(atual = null) {
            if (atual == 'cadastrar-tab') {
                $("#cadastrar-tab").tab('show')
                $("#vergerenciar").hide()
                $("#vercadastrar").show()
            } else {
                $("#vergerenciar").show()
                $("#vercadastrar").hide()
                $("#gerenciar-tab").tab('show')
            }
        }


        function verificaForcaSenha() {
            let numeros = /([0-9])/;
            let alfabetoa = /([a-z])/;
            let alfabetoA = /([A-Z])/;
            let chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            let senha = $('#senha').val();

            if (senha.length < 6) {
                $('#senha').addClass('is-invalid');
                $('#senha').removeClass('is-valid');
                $('.status-senha').html("Fraco, insira no mínimo 6 caracteres");
            } else {
                if (senha.match(numeros) && senha.match(alfabetoa) && senha.match(alfabetoA) && senha.match(chEspeciais)) {
                    $('.status-senha').html("Senha Forte!");
                    $('#senha').addClass('is-valid');
                    $('#senha').removeClass('is-invalid');
                    return true;
                } else {
                    $('.status-senha').html("Senha Fraca!");
                    $('#senha').addClass('is-invalid');
                    $('#senha').removeClass('is-valid');
                    return false;
                }
            }
        }

        function confirmaSenha() {
            let senha = $('#senha').val();
            let confirmaSenha = $('#confirma-senha').val();
            if (senha !== confirmaSenha) {
                $('#confirma-senha').addClass('is-invalid');
                return false;
            } else {
                $('#confirma-senha').removeClass('is-invalid');
                return true;
            }
        }
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include '../../include/nav-top.php';
        include '../../include/sidebar.php';
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4><small><b>Usuarios</b></small></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASED ?>"><small><b>Inicio</b></small></a></li>
                                <li class="breadcrumb-item active"><small><b>Cadastro de usuarios</b></small></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['acao'] == 1) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-ban"></i> <?= $_GET['msg'] ?>
                    </div>
                <?php
                } else if (isset($_GET['msg']) && $_GET['acao'] == 0) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-check"></i> <?= $_GET['msg'] ?>
                    </div>
                <?php
                }
                ?>
            </section>


            <section class="content mx-3">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-success card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" onclick="mudaTabs('gerenciar-tab')" id="gerenciar-tab" data-toggle="pill" href="#gerenciar" role="tab" aria-controls="gerenciar" aria-selected="true">Gerenciar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cadastrar-tab" onclick="mudaTabs('cadastrar-tab')" data-toggle="pill" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="false">Cadastrar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="gerenciar" role="tabpanel" aria-labelledby="gerenciar-tab">
                                        Ver usuarios registrados.
                                    </div>
                                    <div class="tab-pane fade" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
                                        <form method="post" autocomplete="off" action="./include/gUsuario.php">
                                            <div class=form-group>
                                                <label><small><b>Nome:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nome" placeholder="Nome da categoria">
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label><small><b>Email:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" placeholder="Nome da categoria">
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label><small><b>Login:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="login" placeholder="nome.sobrenome">
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <label for='senha'> Senha </label>
                                                <div class="input-group input-group-sm has-validation">
                                                    <span class="input-group-text pointer" id="olho">
                                                        <i class="fa fa-eye" id="mostra-senha"></i>
                                                        <i class="fa fa-eye-slash" id="oculta-senha" style="display:none;"></i>
                                                    </span>
                                                    <input class='form-control senha' id="senha" onkeyup="verificaForcaSenha()" name="senha" type="password" required>
                                                    <div class="invalid-feedback">
                                                        <b class="status-senha">Senha fraca!</b>
                                                    </div>
                                                    <div class="valid-feedback">
                                                        <b class="status-senha">Senha forte!</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <label for='senha'> Confirme a senha </label>
                                                <div class="input-group input-group-sm has-validation">
                                                    <span class="input-group-text pointer" id="olho">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                    <input class='form-control senha' id="confirma-senha" onkeyup="confirmaSenha()" name="confirma-senha" type="password" required>
                                                    <div class="invalid-feedback is-invalid">
                                                        <b>Senhas não coincidem!</b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline mx-3">
                                                    <input type="radio" value="a" id="radioPrimary1" name="tipodeusuario">
                                                    <label for="radioPrimary1">Administrador</label>
                                                </div>



                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" value="u" id="radioPrimary2" name="tipodeusuario">
                                                    <label for="radioPrimary2">Usuario</label>
                                                </div>
                                            </div>
                                            <div class="align-right">
                                                <button type="submit" class="btn btn-block btn-success">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="card card-success card-outline card-tabs">
                            <div class="card-header">
                                <h3 class="card-title">Usuarios</h3>
                            </div>
                            <div class="card-body">
                                <div id="vergerenciar" style="display: none;">
                                    <div class="table-responsive">
                                        <table id="table-usuario" class="table table-bordered table-sm table-hover dtr-inline collapsed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Nome</th>
                                                    <th class="text-center">Login</th>
                                                    <th class="text-center">Perfil</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $queryBusca = "select 
                                                                id,
                                                                nome,
                                                                login,
                                                                status,
                                                                perfil
                                                            from usuario";

                                                $resp = mysqli_query($con, $queryBusca);
                                                while ($row = mysqli_fetch_array($resp)) {
                                                    $status = $row[3] == 'a' ? "<span class='badge badge-success'>Ativado</span>" : "<span class='badge badge-danger'>Desativado</span>";
                                                    $perfil = $row[4] == 'a' ? "<span class='badge badge-success'>Admin</span>" : "<span class='badge badge-warning'>Usuario</span>";
                                                ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <small><b>#<?= $row[0] ?></b></small> <img class="rounded-circle " src="<?= $_SESSION['perfil']['foto'] ?>" width="30" alt="">
                                                        </td>
                                                        <td class="text-center"><?= $row[1] ?></td>
                                                        <td class="text-center"><?= $row[2] ?></td>
                                                        <td class="text-center"><?= $perfil ?></td>
                                                        <td class="text-center"><?= $status ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= BASED ?>/perfil/?id=<?= $row[0] ?>">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                </div>
                                <div id="vercadastrar" style="display: none;">
                                    <div class="text-center font-weight-bold">
                                        <span style="font-size: 18px;"> Seja bem vindo ao cadastro de usuarios! </span>
                                        <p style="font-size: 15px;"> Você está prestes a entrar em um mundo novo de gerenciamento de estoque e vai melhorar o desenpenho do seu negocio com essa nova ferramenta. </p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <lottie-player src="<?= BASE ?>/assets/animation/welcome.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay>
                                        </lottie-player>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php
        include "../../include/footer.php";
        ?>
    </div>

    <!-- jQuery -->
    <script src="<?= BASE ?>/assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE ?>/assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= BASE ?>/assets/js/demo.js"></script>
    <script src="<?= BASE ?>/assets/js/lottie-player.js"></script>

    <script src="<?= BASED ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASED ?>/assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?= BASED ?>/assets/vendor/select2/js/select2.min.js"></script>
</body>

</html>