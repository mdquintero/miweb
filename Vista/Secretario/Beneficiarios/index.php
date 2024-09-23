<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");
$obj = new BeneficiarioControlador();
$rows = $obj->index();
?>
<thead>
    <tr>
        <th scope="col"># Identificacion</th> 
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Tipo de Identificacion</th>
        <th scope="col">Parentesco</th>
        <th scope="col"># Identificacion Afiliado</th>
        <th scope="col">Modificar</th>
        <th scope="col">Eliminar</th>
    </tr>
</thead>
<tbody>
    <?php if($rows): ?>
        <?php foreach($rows as $row): ?>
            <tr>
                <th><?= htmlspecialchars($row[0]) ?></th>
                <th><?= htmlspecialchars($row[1]) ?></th>
                <th><?= htmlspecialchars($row[2]) ?></th>
                <th><?= htmlspecialchars($row[3]) ?></th>
                <th><?= htmlspecialchars($row[4]) ?></th>
                <th><?= htmlspecialchars($row[5]) ?></th>
                <td>
                   
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmEditModal<?= htmlspecialchars($row[0]) ?>">Modificar</a>

                  
                    <div class="modal fade" id="confirmEditModal<?= htmlspecialchars($row[0]) ?>" tabindex="-1" aria-labelledby="confirmEditLabel<?= htmlspecialchars($row[0]) ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmEditLabel<?= htmlspecialchars($row[0]) ?>">Confirmar Modificación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres modificar <br>El registro con número de identificación <?= htmlspecialchars($row[0]) ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="ModificarBeneficiarios.php?id=<?= urlencode($row[0]) ?>" class="btn btn-success">Confirmar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= htmlspecialchars($row[0]) ?>">Eliminar</a>

                   
                    <div class="modal fade" id="deleteModal<?= htmlspecialchars($row[0]) ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= htmlspecialchars($row[0]) ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel<?= htmlspecialchars($row[0]) ?>">Confirmar Eliminación</h5>
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
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8" class="text-center">No hay registros actualmente</td>
        </tr>
    <?php endif; ?>
</tbody>
<a href="RegistroBeneficiarios.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar beneficiario
</a>
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
