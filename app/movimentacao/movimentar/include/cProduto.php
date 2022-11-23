<?php

include "../../../config/conn.php";

$estoque = $_POST['estoque'];



if (!empty($estoque)) {
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
}

?>