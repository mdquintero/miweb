<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/head.php");
require_once ("../../../Controlador/UsuarioControlador.php");

$Obj = new UsuarioControlador();
$Filas = $Obj->index();
?>

<thead>
    <tr>
        <th scope="col">Id</th> 
        <th scope="col">Codigo de usuario</th>
        <th scope="col">Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Rol</th>
        <th scope="col">Detalles</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>

<tbody>
    <?php
        $id = 1;
        if($Filas): ?>
        
        <?php foreach($Filas as $Fila): ?>
            <tr>
                <th><?= $id++ ?></th>
                <th><?= $Fila['Codigo'] ?></th>
                <th><?= $Fila['Usuario'] ?></th>
                <th><?= $Fila['Correo'] ?></th>
                <th><?= $Fila['Nombre'] ?></th>
                <th><a href="DetallesUsuario.php?id=<?= $Fila['Codigo'] ?>" class="btn btn-primary">Detalles</a></th>
                <th>
                
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?=$Fila['Codigo']?>">Modificar</a>

                   
                    <div class="modal fade" id="editModal<?=$Fila['Codigo']?>" tabindex="-1" aria-labelledby="editModalLabel<?=$Fila['Codigo']?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?=$Fila['Codigo']?>">Confirmar Modificación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que quieres modificar este registro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="Editar.php?id=<?= $Fila['Codigo']?>" class="btn btn-success">Modificar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?=$Fila['Codigo']?>">Eliminar</a>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="id<?=$Fila['Codigo']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Una vez eliminado no se podrá recuperar el registro
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                <a href="Eliminar.php?id=<?= $Fila['Codigo']?>" class="btn btn-danger">Eliminar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            
        <?php endforeach; ?>
    <?php else: ?>
        <td colspan="8" class="text-center">No hay registros</td>        
    <?php endif; ?>
</tbody>
<a href="CrearUsuario.php" class="btn btn-transparent">
    <i class="fa-solid fa-file-arrow-up"></i> Agregar usuario
</a>

<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
