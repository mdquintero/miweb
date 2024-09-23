<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/head.php");
    require_once("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();
    $rows = $obj->IndexAbogado();
?>

<thead>
    <tr>
        <th scope="col">Numero de Radicado</th> 
        <th scope="col">Fecha Inicio</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Juzgado</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    <?php if($rows): ?>
        <?php foreach($rows as $row): ?>
            <tr>
                <th><?= $row[0] ?></th>
                <th><?= $row[1] ?></th>
                <th><a href="DescripcionProceso.php?id=<?= $row[0]?>" class="btn btn-danger">Ver Descripcion</a></th>      
                <th><a href="../Juzgado/mostrar.php?id=<?= $row[4]?>" class="btn btn-primary">Ver Juzgado</a></th>
                <th>
                   
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmEditModal<?= $row[0] ?>">Modificar</a>

                
                    <div class="modal fade" id="confirmEditModal<?= $row[0] ?>" tabindex="-1" aria-labelledby="confirmEditLabel<?= $row[0] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmEditLabel<?= $row[0] ?>">Confirmar Modificación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres modificar <br> El registro con número de radicado <?= $row[0] ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="Editar.php?id=<?= $row[0] ?>" class="btn btn-success">Confirmar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No hay registros actualmente</td>
        </tr>
    <?php endif; ?>
</tbody>   
<a href="CrearProceso.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar proceso jurídico
</a>
<a href="../Juzgado/index.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Juzgados
</a>

<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Secretario/head/footer.php");
?>
