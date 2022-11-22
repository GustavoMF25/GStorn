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
    <title>GStorn - Produtos</title>

    <link rel="icon" href="<?= BASE ?>/assets/images/logoGStor.png" />

    <link rel="stylesheet" href="<?= BASED ?>/assets/vendor/select2/css/select2.min.css">

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
            $(".money").maskMoney()
            // BASICO DATATABLE
            $("#table-categoria").DataTable({
                "dom": 'rtip',
                "responsive": true,
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
                            <h4><small><b>Produtos</b></small></h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= BASED ?>"><small><b>Inicio</b></small></a></li>
                                <li class="breadcrumb-item active"><small><b>Cadastro de produtos</b></small></li>
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
                                        <a class="nav-link active" onclick="mudaTabs('gerenciar-tab')" id="gerenciar-tab" data-toggle="pill" href="#gerenciar" role="tab" aria-controls="gerenciar" aria-selected="true">Produtos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cadastrar-tab" onclick="mudaTabs('cadastrar-tab')" data-toggle="pill" href="#cadastrar" role="tab" aria-controls="cadastrar" aria-selected="false">Cadastrar</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade active show" id="gerenciar" role="tabpanel" aria-labelledby="gerenciar-tab">
                                        Ver todos os produtos cadastrados.
                                    </div>
                                    <div class="tab-pane fade" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab">
                                        <form method="post" action="./include/gProduto.php">
                                            <div class=form-group>
                                                <label><small><b>Nome:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="nome" placeholder="Nome do produto">
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label><small><b>Código:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><b>#</b></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="codigo" placeholder="Código do Produto">
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label><small><b>Custo:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><b>R$</b></span>
                                                    </div>
                                                    <input type="text" class="form-control money" name="custo" placeholder="Custo do produto">
                                                </div>
                                            </div>
                                            <div class=form-group>
                                                <label><small><b>Venda:</b></small></label>
                                                <div class="input-group input-group-sm mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><b>R$</b></span>
                                                    </div>
                                                    <input type="text" class="form-control money" name="venda" placeholder="Valor de venda do produto">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for='descricao'> <small><b>Descricao:</b></small></label>
                                                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição do produto..." style="height: 89px;resize: none;"></textarea>
                                            </div>

                                            <div class='form-group'>
                                                <label for='categoria'> <small><b>Categoria:</b></small></label>
                                                <select class="form-control select2" id="categoria" style="width: 100%;" name="categoria">
                                                    <option value="">Selecione a categoria</option>
                                                    <?php
                                                    $queryBusca = "select 
                                                                id,
                                                                nome
                                                            from categoria 
                                                            where idusuario = {$_SESSION['idusuario']}";

                                                    $resp = mysqli_query($con, $queryBusca);
                                                    while ($row = mysqli_fetch_array($resp)) {
                                                    ?>
                                                        <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class='form-group'>
                                                <label for='fornecedor'><small><b> Fornecedor:</b></small></label>
                                                <select class="form-control select2" id="fornecedor" style="width: 100%;" name="fornecedor">
                                                    <option value="">Selecione um fornecedor</option>
                                                    <?php
                                                    ?>
                                                </select>
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
                                <h3 class="card-title">Produtos</h3>
                            </div>
                            <div class="card-body">
                                <div id="vergerenciar" style="display: none;">

                                    <div class="table-responsive">
                                        <table id="table-categoria" class="table table-sm table-bordered table-hover  dtr-inline collapsed">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Nome</th>
                                                    <th class="text-center">Código</th>
                                                    <th class="text-center">Valor de custo</th>
                                                    <th class="text-center">Valor de venda</th>
                                                    <th class="text-center">Descrição</th>
                                                    <th class="text-center">Categoria</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $queryBusca = "select 
                                                                prod.id,
                                                                prod.nome,
                                                                prod.codigo,
                                                                prod.custo,
                                                                prod.venda,
                                                                prod.descricao,
                                                                cat.nome,
                                                                prod.status
                                                            from produto prod
                                                            left join categoria cat on(cat.id = prod.idcategoria) where prod.idusuario = {$_SESSION['idusuario']}
                                                            ";

                                                $resp = mysqli_query($con, $queryBusca);
                                                while ($row = mysqli_fetch_array($resp)) {
                                                    $status = $row[7] == 'a' ? "<span class='badge badge-success'>Ativado</span>" : "<span class='badge badge-danger'>Desativado</span>";
                                                ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <small><b>#<?= $row[0] ?></b></small>
                                                        </td>
                                                        <td class="text-center"><?= $row[1] ?></td>
                                                        <td class="text-center"><?= $row[2] ?></td>
                                                        <td class="text-center">R$ <?= $row[3] ?></td>
                                                        <td class="text-center">R$ <?= $row[4] ?></td>
                                                        <td class="text-center"><?= $row[5] ?></td>
                                                        <td class="text-center"><?= $row[6] ?></td>
                                                        <td class="text-center"><?= $status ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                        </table>
                                    </div>
                                </div>
                                <div id="vercadastrar" style="display: none;">
                                    <div class="text-center ">
                                        <span class="font-weight-bold" style="font-size: 18px;"> Seja bem vindo ao cadastro de produtos! </span>
                                        <p style="font-size: 15px;"> Realize o cadastros dos seus produtos para que seja possível vizualiar no sistema e realizar as devidas movimentações de entrada e saida de estoque. </p>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <lottie-player src="<?= BASE ?>/assets/animation/product.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay>
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
    <script src="<?= BASED ?>/assets/vendor/jquery/jquery.maskMoney.min.js"></script>
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