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
    <title>GStorn | Movimentação</title>

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

    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/select2/css/select2.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.select2').select2({
                width: 'resolve',
                theme: "classic"
            });

            mudaTabs('<?= $tabs ?>')
            // BASICO DATATABLE

            $(".money").maskMoney()
            $("#table-movimentacao").DataTable({
                "dom": 'Bfrtip',
                "responsive": true,
                "searching": false,
                "info": false,
                // "buttons": [{
                //     text: "<span><i class='fa fa-cart-plus' aria-hidden='true'></i> Venda</span>",
                //     action: function(e, dt, node, config) {
                //         $("#cadastroVenda").modal('show');
                //     }
                // }, {
                //     text: "<i class='fa fa-plus-square' aria-hidden='true'></i> Movimentação",
                //     action: function(e, dt, node, config) {
                //         $("#cadastroMovimentacao").modal('show');
                //     }
                // }],
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


        function mudaProduto(estoque) {
            console.log(estoque)
            let url = './include/cProduto.php'
            $.ajax({
                    url: url,
                    type: 'post',
                    dataType: 'html',
                    data: {
                        estoque
                    },
                    beforeSend: function() {
                        $("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(msg) {
                    console.log(msg)
                })
                .fail(function(jqXHR, textStatus, msg) {
                    // alert(msg);
                    console.log(`Error -> ${msg}`)
                });
        }

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
                            <h4><small><b>Movimentação Entrada | Saída</b></small></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASED ?>"><small><b>Inicio</b></small></a></li>
                                <li class="breadcrumb-item active"><small><b>Cadastro de categoria</b></small></li>
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

                <div class="card card-success card-outline card-tabs">
                    <div class="card-header">
                        <h3 class="card-title">Entrada | Sáida</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-movimentacao" class="table table-bordered table-hover dtr-inline collapsed">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Estoque</th>
                                        <th class="text-center">Produto</th>
                                        <th class="text-center">Tipo de Movimentacao</th>
                                        <th class="text-center">Custo</th>
                                        <th class="text-center">Venda</th>
                                        <th class="text-center">Quantidade</th>
                                        <th class="text-center">Data</th>
                                        <th class="text-center">Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryBusca = "select 
                                                                mov.id,
                                                                est.nome,
                                                                concat(prod.codigo, concat(' - ', prod.nome)),
                                                                mov.tipo,
                                                                mov.precusto,
                                                                mov.prevenda,
                                                                mov.quantidade,
                                                                mov.criado_data,
                                                                mov.criado_hora 
                                                            from movimentacao mov
                                                            left join estoque est on(mov.idestoque = est.id)
                                                            left join produto prod on(prod.id = mov.idproduto)
                                                            where mov.idusuario = {$_SESSION['idusuario']}";


                                    $resp = mysqli_query($con, $queryBusca);
                                    while ($row = mysqli_fetch_array($resp)) {
                                        // $status = $row[2] == 'a' ? "<span class='badge badge-success'>Ativado</span>" : "<span class='badge badge-danger'>Desativado</span>";
                                    ?>
                                        <tr>
                                            <td class="text-center"><small><b>#<?= $row[0] ?></b></small></td>
                                            <td class="text-center"><?= $row[1] ?></td>
                                            <td class="text-center"><?= $row[2] ?></td>
                                            <td class="text-center"><?= $row[3] ?></td>
                                            <td class="text-center"><?= $row[4] ?></td>
                                            <td class="text-center"><?= $row[5] ?></td>
                                            <td class="text-center"><?= $row[6] ?></td>
                                            <td class="text-center"><?= $row[7] ?></td>
                                            <td class="text-center"><?= $row[8] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                    <div id="vercadastrar" style="display: none;">
                        <div class="text-center font-weight-bold">
                            <span style="font-size: 18px;"> Cadastre suas categorias para facilitar a pesquisa de produtos no estoque. </span>
                        </div>
                        <div class="d-flex justify-content-center">
                            <lottie-player src="<?= BASE ?>/assets/animation/category.json" background="transparent" speed="1" style="width: 600px; height: 100px;" loop autoplay>
                            </lottie-player>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php
        include './include/mCadastro.php';
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
    <script src="<?= BASED ?>/assets/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= BASED ?>/assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script src="<?= BASED ?>/assets/vendor/jquery/jquery.maskMoney.min.js"></script>
    <script src="<?= BASED ?>/assets/vendor/select2/js/select2.min.js"></script>
</body>

</html>