<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/AfiliadoControlador.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");

$obj = new AfiliadoControlador();
$ObjB = new BeneficiarioControlador();
$DatosB = $ObjB->index();
$rows = $obj->index();
?>

<!-- Botón de agregar afiliado en su lugar original -->
<a href="RegistrarAfiliados.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar afiliado
</a>

<!-- Contenedor con scroll horizontal para la tabla -->
<div style="overflow-x: auto; margin-top: 10px;">
    <table class="table table-striped table-bordered">
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
            <?php if($rows): ?>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <th><?= $row[0] ?></th>
                        <th><?= $row[1] ?></th>
                        <th><?= $row[2] ?></th>
                        <th><?= $row[3] ?></th>
                        <th><?= $row[4] ?></th>
                        <th><?= $row[5] ?></th>
                        <th><?= $row[6] ?></th>
                        <th><?= $row[7] ?></th>

                        <th>
              
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $row[0] ?>">Modificar</a>

                        
                            <div class="modal fade" id="editModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row[0] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $row[0] ?>">Confirmar Modificación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que quieres modificar este registro?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a href="ModificarAfiliados.php?id=<?= $row[0] ?>" class="btn btn-success">Modificar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                        
                        <td>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row[0] ?>">Eliminar</a>
                            
                            
                            <div class="modal fade" id="deleteModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row[0] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?= $row[0] ?>">¿Desea eliminar el registro?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Una vez eliminado no se podrá recuperar el registro.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="Eliminar.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <?php
                        $CodigoB = $ObjB->getCodigo($row[0]);
                        if($CodigoB): ?>
                            <th><a href="../Beneficiarios/Mostrar.php?id=<?= $CodigoB ?>" class="btn btn-primary">Beneficiario</a></th>
                        <?php else: ?>
                            <th>No existe</th>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="text-center">No hay registros actualmente</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
