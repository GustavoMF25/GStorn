<form action="aUsuario" method="POST">
    <input name="idusuario" hidden="true" value="<?= $row[0] ?>" />
    <div class="row  mb-0">
        <div class="form-group col-lg-5">
            <small><b>E-mail</b> <b class="text-danger">*</b></small>
            <input type="email" class="form-control" required="true" name="email" value="<?= $row[3] ?>">
        </div>
        <div class="form-group col-lg-5">
            <small><b>Nome</b> <b class="text-danger">*</b></small>
            <input type="text" class="form-control" required="true" name="nome" value="<?= $row[2] ?>">
        </div>
        <div class="form-group col-lg-2">
            <small><b>O usuário é externo?</b> <b class="text-danger">*</b></small>
            <br>
            <label class="fancy-radio">
                <input type="radio" name="externo" value="s" required="true" checked="true">
                <span><i></i>Sim</span>
            </label>
            <label class="fancy-radio">
                <input type="radio" name="externo" value="n" >
                <span><i></i>Não</span>
            </label>
        </div>
        <div class="form-group col-lg-2" >
            <small><b>Status</b> <b class="text-danger">*</b></small>
            <select class="form-control select2" name="ativo" id="ativo" >
                <option value="s">Ativo</option>
                <option value="n">Inativo</option>
            </select>
        </div> 
        <div class="form-group col-lg-3"  hidden="true" id="divEmpresa">
            <small><b>Empresa</b> <b class="text-danger">*</b></small>
            <select class="form-control select2" name="empresa" id="empresa" >
                <option>Escolha uma empresa</option>
                <?php
                $sqlEmpresa = "select idempresa,
                                      codigo,
                                      apelido
                                    from empresa
                                where ativo = 's'";
                $resultEmpresa = mysqli_query($con, $sqlEmpresa);
                while ($rowEmpresa = mysqli_fetch_array($resultEmpresa)) {
                    ?>
                    <option value="<?= $rowEmpresa[0] ?>"><?= $rowEmpresa[1] ?> - <?= $rowEmpresa[2] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group col-lg-3" hidden="true" id="divMatricula">
            <small><b>Matrícula</b> <b class="text-danger">*</b></small>
            <input type="text" class="form-control" name="matricula" id="matricula"  value="<?= $row[4] ?>">
        </div>                
        <div class="form-group col-lg-4">
            <small><b>O usuário deverá trocar a senha no proximo login?</b> <b class="text-danger">*</b></small>
            <br>
            <label class="fancy-radio">
                <input type="radio" name="trocasenha" value="s" required="" checked="true">
                <span><i></i>Sim</span>
            </label>
            <label class="fancy-radio">
                <input type="radio" name="trocasenha" value="n">
                <span><i></i>Não</span>
            </label>
        </div>

        <div class="col-lg-12 d-flex justify-content-end">
            <button class="btn btn-outline-success"> 
                <i class="fa fa-save"></i> 
                Alterar
            </button>
        </div>
        <small class="align-left pl-2" style="color: red"><b>*</b> Obrigatório</small>
    </div>
</form>