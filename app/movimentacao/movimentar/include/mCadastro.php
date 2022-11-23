<!-- VENDA -->
<div class="modal " id="cadastroVenda" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Venda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class='form-group'>
                                <label for='estoque'><small><b> Estoque:</b></small></label>
                                <select class="form-control select2" onchange="mudaProduto(this.value)" id="estoque" require style="width: 100%;" name="estoque">
                                    <option value="">Selecione</option>
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
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class='form-group'>
                                <label for='produto'><small><b> Produto:</b></small></label>
                                <select class="form-control select2" id="produto" require style="width: 100%;" name="produto">
                                    <option value="">Selecione</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label><small><b>Quantidade:</b></small></label>
                            <div class="input-group input-group-sm mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b><i class="fa fa-list-ul" aria-hidden="true"></i></b></span>
                                </div>
                                <input type="number" min="1" value="1" class="form-control" name="quantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Custo:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="custo" placeholder="Valor unitário da venda">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Venda:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="venda" placeholder="lor unitário do custo">
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success">Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MOVIMENTAÇÃO -->

<div class="modal " id="cadastroMovimentacao" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Movimentação Entrada|Saída</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class='form-group'>
                                <label for='tipomovimentacao'><small><b> Tipo de Movimentação:</b></small></label>
                                <select class="form-control select2" id="tipomovimentacao" require style="width: 100%;" name="tipomovimentacao">
                                    <option value="">Selecione</option>
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saida</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class='form-group'>
                                <label for='estoque'><small><b> Estoque:</b></small></label>
                                <select class="form-control select2" onchange="mudaProduto(this.value)" id="estoque" require style="width: 100%;" name="estoque">
                                    <option value="">Selecione</option>
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
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class='form-group'>
                                <label for='produto'><small><b> Produto:</b></small></label>
                                <select class="form-control select2" id="produto" require style="width: 100%;" name="produto">
                                    <option value="">Selecione</option>
                                    <?php
                                    $queryProduto = "select 
                                                        id,
                                                        codigo,
                                                        nome
                                                    from produto 
                                                    where idusuario = {$_SESSION['idusuario']}";
                                    echo $queryProduto;
                                    $respProduto = mysqli_query($con, $queryProduto);

                                    while ($row = mysqli_fetch_array($respProduto)) {
                                    ?>
                                        <option value="<?= $row[0] ?>"><?= $row[1] ?> - <?= $row[2] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label><small><b>Quantidade:</b></small></label>
                            <div class="input-group input-group-sm mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><b><i class="fa fa-list-ul" aria-hidden="true"></i></b></span>
                                </div>
                                <input type="number" min="1" value="1" class="form-control" name="quantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Custo:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="custo" placeholder="Valor unitário da venda">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Venda:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="venda" placeholder="lor unitário do custo">
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success">Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>