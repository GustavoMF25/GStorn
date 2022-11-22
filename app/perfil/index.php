<?php
include '../config/config.php';
include '../config/conn.php';

if (isset($_GET['id'])) {
    $idusuario = $_GET['id'];
    $sql = "select u.id,
                   u.login,
                   u.nome,
                   u.email,
                   u.foto,
                   u.status
                from usuario u
            where u.id = {$idusuario}";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0) {
        $alert = 2;
        $text = "Usuário não encontrado, tente novamente.";
        // header("location: ../usuario.php?alert=$alert&text=$text");
    } else {
        $row = mysqli_fetch_array($result);
        if ($row[4] <> "") {
            $imagem = BASED . '/perfil/fotos/' . $row[6];
        } else {
            $imagem = BASED . "/assets/images/avatar.png";
        }
    }
} else {
    $alert = 2;
    $text = "Usuário não encontrado, tente novamente.";
    //    header("location: ../usuario.php?alert=$alert&text=$text");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GStorn - Perfil</title>

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

    <style>
        .boxxFixo {
            background-color: #fff;
            margin: 5px;
            height: 75px;
        }

        .iconeFixo {
            font-size: 25px;
            line-height: 70px;
        }

        .boxxFixo .iconeFixoHidden {
            color: #fff;
            font-size: 14px;
            line-height: 70px
        }

        .boxxFixo:hover .iconeFixoHidden {
            color: #343a40 !important;
            font-size: 14px;
            line-height: 70px
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include '../include/nav-top.php';
        include '../include/sidebar.php';
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">
            <div class="content-wrapper">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Blank Page</li>
                                </ol>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <div class=" clearfix  middle shadow-lg bg-white rounded mb-5 mx-3">
                    <div class="card mb-0">
                        <div class="card-body mb-0 pb-0">
                            <div class="row">
                                <div class="form-group col-lg-3 text-center">
                                    <img src="<?= $imagem ?>" class="rounded-circle" style="max-width: 100px; max-height: 100px">
                                </div>
                                <div class="form-group col-lg-6 row">
                                    <div class="col-lg-12">
                                        <small><b>Login: </b> <?= $row[1] ?></small>
                                    </div>
                                    <div class="col-lg-12">
                                        <small><b>E-mail: </b> <?= $row[3] ?> </small>
                                    </div>
                                    <div class="col-lg-12">
                                        <small><b>Nome: </b> <?= $row[2] ?></small>
                                    </div>
                                    <div class="col-lg-12">
                                        <small><b>Status: </b></small>
                                        <?php
                                        if ($row[5] == 's') {
                                            echo '<span class="badge badge-success">Ativo</span>';
                                        }
                                        if ($row[5] == 'n') {
                                            echo '<span class="badge badge-warning">Bloqueado</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#historico"><i class="fa fa-refresh"></i> Histórico</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#editar"><i class="fa fa-pencil"></i> Editar</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#alterasenha"><i class="fa fa-lock"></i> Alterar Senha</a></li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="historico">
                                            <?php
                                            include 'include/cHistorico.php';
                                            ?>
                                        </div>
                                        <div class="tab-pane " id="editar">
                                            <?php
                                            include 'include/cUsuario.php';
                                            ?>
                                        </div>

                                        <div class="tab-pane" id="alterasenha">
                                            <?php
                                            include 'include/cAlteraSenha.php';
                                            ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <!-- jQuery -->
    <script src="<?= BASE ?>/assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE ?>/assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= BASE ?>/assets/js/demo.js"></script>
</body>

</html>