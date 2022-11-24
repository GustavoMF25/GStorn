<?php
include '../../config/config.php';
include '../../config/conn.php';


$estoque = isset($_POST['estoque']) ? $_POST['estoque'] : '';

$estoque = !empty($estoque) ? "and idestoque = {$estoque}" : '';



$queryBusca = "
                SELECT 
                    concat(prod.codigo, concat(' - ', prod.nome)),
                    est.nome,
                    count(prod.id) as quantidade
                FROM produtoestoque proes
                left join produto prod on(proes.idproduto = prod.id)
                left join estoque est on(proes.idestoque = est.id)
                where prod.idusuario = {$_SESSION['idusuario']} $estoque
                group by est.id, prod.id;";

$resp = mysqli_query($con, $queryBusca);
while ($row = mysqli_fetch_array($resp)) {
    // $status = $row[3] == 'a' ? "<span class='badge badge-success'>Ativado</span>" : "<span class='badge badge-danger'>Desativado</span>";
    // $perfil = $row[4] == 'a' ? "<span class='badge badge-success'>Admin</span>" : "<span class='badge badge-warning'>Usuario</span>";
?>
    <tr>
        <td class="text-center">
            <small><b><?= $row[0] ?></b></small>
        </td>
        <td class="text-center"><?= $row[1] ?></td>
        <td class="text-center"><?= $row[2] ?></td>

    </tr>
<?php
}
?>