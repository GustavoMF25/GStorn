<?php
include '../config/config.php';
include '../config/conn.php';

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
    <title>GStorn - Estoque</title>

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
            $('.select2').select2({
                width: 'resolve',
                theme: "classic"
            });

            mudaTabs('<?= $tabs ?>')
            // BASICO DATATABLE


            buscaProdutoEstoque()
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

        function buscaProdutoEstoque(estoque = null) {
            let url = './include/cProdutoEstoque.php';

            let table = $("#table-estoque").DataTable();
            $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'html',
                    data: {
                        estoque
                    },
                    beforeSend: function() {
                        // Pode ser colocado um Loading
                        $("#tableProdutoEstoque").html("ENVIANDO...");
                    }
                })
                .done(function(dados) {
                    table.destroy();

                    $("#tableProdutoEstoque").html(dados)
                    $("#table-estoque").DataTable({
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
                .fail(function(jqXHR, textStatus, msg) {
                    // alert(msg);
                    console.log(`Error -> ${msg}`)
                });
        }
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include '../include/nav-top.php';
        include '../include/sidebar.php';
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4><small><b>Estoque</b></small></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASED ?>"><small><b>Inicio</b></small></a></li>
                                <li class="breadcrumb-item active"><small><b>Estoque</b></small></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['acao'] == 1) {
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-ban"></i> <?= $_GET['msg'] ?>
                    </div>
                <?php
                } else if (isset($_GET['msg']) && $_GET['acao'] == 0) {
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i> <?= $_GET['msg'] ?>
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
                                        <a class="nav-link" id="cadastrar-tab" onclick="mudaTabs('cadastrar-tab')" data-toggle="pill" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="false">Entrada</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="saida-tab" onclick="mudaTabs('saida-tab')" data-toggle="pill" href="#saida" role="tab" aria-controls="saida" aria-selected="false">Saida</a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="gerenciar" role="tabpanel" aria-labelledby="gerenciar-tab">
                                        <div class='form-group'>
                                            <label for='estoque'><small><b> Estoque:</b></small></label>
                                            <select class="form-control select2" onchange="buscaProdutoEstoque(this.value)" id="estoqueGerencia" style="width: 100%;" name="estoque">
                                                <option value="">Selecione um estoque</option>
                                                <?php
                                                $queryEstoque = "select
                                                        id,
                                                        nome 
                                                    from estoque 
                                                    where idusuario = {$_SESSION['idusuario']}";
                                                $respEstoque = mysqli_query($con, $queryEstoque);
                                                while ($row = mysqli_fetch_array($respEstoque)) {
                                                ?>
                                                    <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
                                        <form method="post" autocomplete="off" action="./include/gProdutoEstoque.php">
                                            <div class='form-group'>
                                                <label for='estoque'><small><b> Estoque:</b></small></label>
                                                <select class="form-control select2" id="estoque" required style="width: 100%;" name="estoque">
                                                    <option value="">Selecione um estoque</option>
                                                    <?php
                                                    $queryEstoque = "select
                                                        id,
                                                        nome 
                                                    from estoque 
                                                    where idusuario = {$_SESSION['idusuario']}";
                                                    $respEstoque = mysqli_query($con, $queryEstoque);
                                                    while ($row = mysqli_fetch_array($respEstoque)) {
                                                    ?>
                                                        <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class='form-group'>
                                                <label for='produto'><small><b> Produto:</b></small></label>
                                                <select class="form-control select2" id="produto" required style="width: 100%;" name="produto">
                                                    <option value="">Selecione um produto</option>
                                                    <?php
                                                    $queryProduto = "select 
                                                                        id,
                                                                        codigo,
                                                                        nome
                                                                    from produto 
                                                                    where idusuario = {$_SESSION['idusuario']}";
                                                    $respProduto = mysqli_query($con, $queryProduto);

                                                    while ($row = mysqli_fetch_array($respProduto)) {
                                                    ?>
                                                        <option value="<?= $row[0] ?>"><?= $row[1] ?> - <?= $row[2] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for='quantidade'> <small><b>Quantidade:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="number" min="1" value="1" required class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade de itens">
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
                                <h3 class="card-title">Estoque</h3>
                            </div>
                            <div class="card-body">
                                <div id="vergerenciar" style="display: none;">
                                    <div class="table-responsive">
                                        <table id="table-estoque" class="table table-bordered table-sm table-hover dtr-inline collapsed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Produto</th>
                                                    <th class="text-center">Estoque</th>
                                                    <th class="text-center">Quantidade</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tableProdutoEstoque">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="vercadastrar" style="display: none;">
                                    <div class="text-center font-weight-bold">
                                        <span style="font-size: 18px;"> Seja bem vindo ao cadastro de usuarios! </span>
                                        <p style="font-size: 15px;"> Você está prestes a entrar em um mundo novo de gerenciamento de estoque e vai melhorar o desenpenho do seu negocio com essa nova ferramenta. </p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <lottie-player src="<?= BASE ?>/assets/animation/str.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay>
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
        include "../include/footer.php";
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