<?php
require_once ("../Head/head.php");
require_once ("../../../Controlador/UsuarioControlador.php");
$Obj = new UsuarioControlador();
$Filas = $Obj->indexCoordinador();
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
            if(isset($_GET["CodigoProceso"]) && isset($Filas)): ?> 
                <?php
                    $CodigoProceso = $_GET['CodigoProceso'];
                    foreach($Filas as $Fila): ?>
                    <tr>
                    <th><?= $id++ ?></th>
                    <th><?= $Fila['Codigo'] ?></th>
                    <th><?= $Fila['Usuario'] ?></th>
                    <th><?= $Fila['Correo'] ?></th>
                    <th><?= $Fila['Nombre'] ?></th>
                        <th><a href="DetallesUsuario.php?id=<?= $Fila['Codigo'] ?>" class="btn btn-primary">Detalles</a></th>
                        <th>
                        
                            <!-- Button trigger modal Asignar -->
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#asignar<?= $Fila['Codigo'] ?>">Asignar</a>

                            <!-- Modal Asignar -->
                            <div class="modal fade" id="asignar<?= $Fila['Codigo'] ?>" tabindex="-1" aria-labelledby="asignarLabel<?= $Fila['Codigo'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="asignarLabel<?= $Fila['Codigo'] ?>">¿Desea asignar el proceso?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta a punto de asignar el proceso "<?= $CodigoProceso ?>" al abogado "<?= $Fila['Nombres'] ?> <?= $Fila['Apellidos'] ?>".
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="Asignacion.php?CodigoProceso=<?= $CodigoProceso ?>&CodigoUsuario=<?= $Fila['Codigo'] ?>" class="btn btn-danger">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Button trigger modal Reasignar -->
                            <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#reasignar<?= $Fila['Codigo'] ?>">Reasignar</a>

                            <!-- Modal Reasignar -->
                            <div class="modal fade" id="reasignar<?= $Fila['Codigo'] ?>" tabindex="-1" aria-labelledby="reasignarLabel<?= $Fila['Codigo'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reasignarLabel<?= $Fila['Codigo'] ?>">¿Desea reasignar el proceso?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta a punto de reasignar el proceso "<?= $CodigoProceso ?>" al abogado "<?= $Fila['Nombres'] ?> <?= $Fila['Apellidos'] ?>".
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="Reasignación.php?CodigoProceso=<?= $CodigoProceso ?>&CodigoUsuario=<?= $Fila['Codigo'] ?>" class="btn btn-danger">Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </th>
                    </tr>
                
            <?php endforeach; ?>
                
            <?php elseif($Filas): ?>
            
            
                <?php foreach($Filas as $Fila): ?>
                    <tr>
                        <th><?= $id++ ?></th>
                        <th><?= $Fila['Codigo'] ?></th>
                        <th><?= $Fila['Usuario'] ?></th>
                        <th><?= $Fila['Correo'] ?></th>
                        <th><?= $Fila['Nombre'] ?></th>
                        <th><a href="DetallesUsuario.php?id=<?= $Fila['Codigo'] ?>" class="btn btn-primary ">Detalles</a></th>
                        <!-- <th><a class="btn btn-success"  href="Editar.php?id=">Modificar</a> -->
                        <th>
                            
                            <a href="HistorialJurídico.php?id=<?=$Fila['Codigo']?>" class="btn btn-success" >Historial</a>  
                        </th>
                    </tr>
                    
                <?php endforeach; ?>
            <?php else: ?>
                <td colspan="8" class="text-center">No hay registros</td>        
            <?php endif; ?>
        </tbody>
        <!-- <a href="CrearUsuario.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar usuario
    </a> -->
      
    
            
                          
                
                 

<?php
if(isset($_GET["Mensaje"]) && $_GET["Mensaje"] == 'YaAsignado'){
    echo "<p style='color: yellow; text-align: center;' >Advertencia: Ya se asigno el proceso jurídico al abogado seleccionado.</p>";
    }
require_once ("../Head/footer.php");
?>