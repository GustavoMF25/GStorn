<?php
include '../../config/config.php';

$tabs = isset($_GET['tabs']) ? $_GET['tabs'] : 'gerenciar';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GStorn</title>

    <link rel="icon" href="<?= BASE ?>/assets/images/logoGStor.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE ?>/assets/vendor/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= BASED ?>/assets/css/main.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // $('.select2').select2();

            mudaTabs('<?= $tabs ?>')
        })


        function mudaTabs(atual = null) {
            console.log(atual)
            if (atual == 'cadastrar') {
                // $("#cadastrar").show()
                // $("#gerenciar").hide()

                $("#vergerenciar").hide()
                $("#vercadastrar").show()
            } else {
                // $("#gerenciar").show()
                // $("#cadastrar").hide()

                $("#vergerenciar").show()
                $("#vercadastrar").hide()
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
                            <h4><small><b>Categorias</b></small></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASED ?>"><small><b>Inicio</b></small></a></li>
                                <li class="breadcrumb-item active"><small><b>Cadastro de categoria</b></small></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-success card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" onclick="mudaTabs('gerenciar')" id="gerenciar-tab" data-toggle="pill" href="#gerenciar" role="tab" aria-controls="gerenciar" aria-selected="true">Gerenciar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cadastrar-tab" onclick="mudaTabs('cadastrar')" data-toggle="pill" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="false">Cadastrar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="gerenciar" role="tabpanel" aria-labelledby="gerenciar-tab">
                                        Busca de categoria
                                    </div>
                                    <div class="tab-pane fade" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
                                        <form method="post" action="./include/gCategoria.php">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nome da categoria">
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
                                <h3 class="card-title">Title</h3>
                            </div>
                            <div class="card-body">
                                <div id="vergerenciar" style="display: none;">
                                    Gerenciar

                                </div>
                                <div id="vercadastrar" style="display: none;">
                                    Cadastrar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php
        include "./include/footer.php";
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
</body>

</html>