<?php
require_once ("../Head/head.php");
require_once ("../../../Controlador/UsuarioControlador.php");
$obj = new UsuarioControlador();
$Dato = $obj->mostrar($_GET['id']);
$id = 1;
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
        
            
            
            
            
                <tr>
                    <th><?= $id++ ?></th>
                    <th><?= $Dato['Codigo'] ?></th>
                    <th><?= $Dato['Usuario'] ?></th>
                    <th><?= $Dato['Correo'] ?></th>
                    <th><?= $Dato['Nombre'] ?></th>
                    <th><a href="DetallesUsuario.php?id=<?= $Dato[0] ?>" class="btn btn-primary">Detalles</a></th>
                    <th><a class="btn btn-success"  href="Editar.php?id=<?= $Dato[0] ?>">Modificar</a>
                    
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?=$Dato[0]?>">Eliminar</a>

                        <!-- Modal -->
                        <div class="modal fade" id="id<?=$Dato[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Una vez eliminado no se podra recuperar el registro
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="Eliminar.php?id=<?= $Dato[0]?>" class="btn btn-danger">Eliminar</a>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
                
           
              
        
        </tbody>
    <center> <form action="index.php"><button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                    </svg>
                    Volver a la tabla 
                </button></form></center>

<?php
require_once ("../Head/footer.php");
?>