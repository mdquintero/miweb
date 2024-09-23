<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/head.php");
    require_once ("../../../Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $rows = $obj->Index();
?>

<thead>
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Despacho</th>
        <th scope="col">Juez</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    <?php if($rows): ?>
        <?php foreach($rows as $row): ?>
            <tr>
                <th><?= $row[0] ?></th>
                <th><?= $row[1] ?></th>
                <th><?= $row[2] ?></th>
                <th><?= $row[3] ?></th>
                <th>
                    <!-- Button trigger modal for Editar -->
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmEditModal<?= $row[0] ?>">Modificar</a>

                    <!-- Modal for Confirmación Editar -->
                    <div class="modal fade" id="confirmEditModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="confirmEditLabel<?= $row[0] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmEditLabel<?= $row[0] ?>">Confirmar Modificación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres modificar el registro con código <?= $row[0] ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="editar.php?id=<?= $row[0] ?>" class="btn btn-success">Confirmar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No hay registros</td>
        </tr>
    <?php endif; ?>
</tbody>
<a href="crear.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar juzgado
</a>

<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/footer.php");
?>
