<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/AfiliadoControlador.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");

$obj = new AfiliadoControlador();
$ObjB = new BeneficiarioControlador();
$DatosB = $ObjB->index();
$rows = $obj->index();
?>

<a href="RegistrarAfiliados.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar afiliado
</a>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Numero Identificacion</th>
            <th scope="col">Tipo Identificacion</th>
            <th scope="col">Tipo Contrato</th>
            <th scope="col">Fecha Afiliacion</th>
            <th scope="col">Empresa</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Cedula del Usuario</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Beneficiario</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row[0]) ?></td>
                    <td><?= htmlspecialchars($row[1]) ?></td>
                    <td><?= htmlspecialchars($row[2]) ?></td>
                    <td><?= htmlspecialchars($row[3]) ?></td>
                    <td><?= htmlspecialchars($row[4]) ?></td>
                    <td><?= htmlspecialchars($row[5]) ?></td>
                    <td><?= htmlspecialchars($row[6]) ?></td>
                    <td><?= htmlspecialchars($row[7]) ?></td>
                    <td>
               
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmEditModal<?= htmlspecialchars($row[0]) ?>">Modificar</a>

                        <!-- Modal for Confirmación Modificar -->
                        <div class="modal fade" id="confirmEditModal<?= htmlspecialchars($row[0]) ?>" tabindex="-1" aria-labelledby="confirmEditLabel<?= htmlspecialchars($row[0]) ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmEditLabel<?= htmlspecialchars($row[0]) ?>">Confirmar Modificación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que quieres modificar el registro con número de identificación <?= htmlspecialchars($row[0]) ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="ModificarAfiliados.php?id=<?= urlencode($row[0]) ?>" class="btn btn-success">Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                 
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= htmlspecialchars($row[0]) ?>">Eliminar</a>

                     
                        <div class="modal fade" id="confirmDeleteModal<?= htmlspecialchars($row[0]) ?>" tabindex="-1" aria-labelledby="confirmDeleteLabel<?= htmlspecialchars($row[0]) ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteLabel<?= htmlspecialchars($row[0]) ?>">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podrá recuperar el registro con número de identificación <?= htmlspecialchars($row[0]) ?>.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="Eliminar.php?id=<?= urlencode($row[0]) ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                        $CodigoB = $ObjB->getCodigo($row[0]);
                        if ($CodigoB): ?>
                            <a href="../Beneficiarios/Mostrar.php?id=<?= urlencode($CodigoB) ?>" class="btn btn-primary">Beneficiario</a>
                        <?php else: ?>
                            No existe
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="11" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
