<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/head.php");
require_once("c://xampp/htdocs/proyectotls/controlador/BeneficiarioControlador.php");

$obj = new BeneficiarioControlador();
$date = $obj->Mostrar($_GET['id']);
   
?>
<thead>
        <tr>
            <th scope="col">NumeroIdentificacion</th> 
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">TipoIdentificacion</th>
            <th scope="col">Parentesco</th>
            <th scope="col">NumIdentificacionAfiliado</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>

    <tbody>
                        
        <tr>

            <td scope="col"><?= $date[0]?>
            <td scope="col"><?= $date[1]?>
            <td scope="col"><?= $date[2]?>
            <td scope="col"><?= $date[3]?>
            <td scope="col"><?= $date[4]?>
            <td scope="col"><?= $date[5]?>
            
            <td><a class="options1" href="ModificarBeneficiarios.php?=id<?= $date[0] ?> ">Editar</a></td>

            <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a></td>

            <center> <form action="index.php"><button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                    </svg>
                    Beneficiarios
                </button></form></center>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a href="delete.php?id=<?= $date[0]?>" class="btn btn-danger">Eliminar</a>
            <!-- <button type="button" >Eliminar</button> -->
        </div>
        </div>
    </div>
    </div>
</div>
        </tr>
                        
    </tbody>

    
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/footer.php");
?>
