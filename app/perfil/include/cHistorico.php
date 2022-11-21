<div class = "modal-body">
    <div class = "table-responsive">
        <table class = "table table-sm table-bordered table-striped table-hover dataTable" id = "tabelaHistorico">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
//                $sqllog = "select idlogalteracao,
//                                  texto,
//                                  datager,
//                                  horager 
//                          from logalteracao
//                          where acao = 'ambiente usuario {$idusuario}'
//                          order by idlogalteracao desc";
//                $resultlog = mysqli_query($con, $sqllog);
//                while ($row = mysqli_fetch_array($resultlog)) {
                    ?>
<!--                    <tr>
                        <td><small><?= $row[0] ?></small></td>
                        <td style="white-space: normal;">
                            <small><?= $row[1] ?> no dia  dataBuscaBanco($row[2]) . " às " . $row[3] ?></small>
                        </td>
                    </tr>-->
                    <?php
//                }
                ?>
            </tbody>
        </table>
    </div>
</div>