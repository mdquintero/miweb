<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/head.php");
require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
$obj = new ProcesosJuridicosControlador();
$date = $obj->Mostrar($_GET['id']);
?>

<thead>
    <tr>
        <th scope="col">Numero de Radicado</th> 
        <th scope="col">Fecha de Inicio</th>
        <th scope="col">Fecha de Fin</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Juzgado</th>
        <th scope="col">Modificar</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td scope="col"><?= $date[0]?></td>
        <td scope="col"><?= $date[1]?></td>
        <td scope="col"><?= $date[2]?></td>
        <td scope="col"><?= $date[3]?></td>
        <td scope="col"><?= $date[4]?></td>
        <td>
          
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">Modificar</a>

          
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Confirmar Modificación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que quieres modificar este registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="Editar.php?id=<?= $date[0] ?>" class="btn btn-success">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</tbody>

<center>
    <form action="index.php">
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
            </svg>
            Volver a la tabla
        </button>
    </form>
</center>

<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>
