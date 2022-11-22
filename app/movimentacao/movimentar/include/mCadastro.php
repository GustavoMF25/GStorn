<div class="modal" id="cadastro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Entrada | Saída</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class='form-group'>
                                <label for='fornecedor'><small><b> Tipo de Movimentação:</b></small></label>
                                <select class="form-control select2" id="fornecedor" style="width: 100%;" name="fornecedor">
                                    <option value="">Selecione um fornecedor</option>
                                    <?php
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Custo:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="venda" placeholder="Valor de venda do produto">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class=form-group>
                                <label><small><b>Venda:</b></small></label>
                                <div class="input-group input-group-sm mb-3">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>R$</b></span>
                                    </div>
                                    <input type="text" class="form-control money" name="venda" placeholder="Valor de venda do produto">
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