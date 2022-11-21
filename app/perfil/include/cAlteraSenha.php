<form action="aAlteraSenha.php" method="POST">
    <input name="idusuario" hidden="true" value="<?= $row[0] ?>"/>
    <div class="form-group col-lg-5">
        <small><b>Nova Senha</b></small>
        <input type="password" class="form-control" required="true" name="senha" id="senha">
    </div>
    <div class="form-group col-lg-5">
        <small><b>Confirme a nova senha</b></small>
        <input type="password" class="form-control" required="true" name="confirmasenha" id="confirmasenha">
    </div>
    <div class="form-group col-lg-5">
        <button type="submit" class="btn btn-outline-success">
            <i class="fa fa-save"></i> Alterar Senha
        </button>
    </div>
</form>