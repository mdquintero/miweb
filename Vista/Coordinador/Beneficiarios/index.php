<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");
$obj = new BeneficiarioControlador();
$rows = $obj->index();
?>
 <thead>
        <tr>
            <th scope="col">Numero de Identificacion</th> 
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Tipo de Identificacion</th>
            <th scope="col">Parentesco</th>
            <th scope="col">Numero de Identificacion del Afiliado</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
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
                    <th>
                        <a href="ModificarBeneficiarios.php?id=<?= $row[0]?>" class="btn btn-success">Modificar</a>

                        <!-- Button trigger modal -->
                        <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?=$row[0]?>">Eliminar</a></td>
                        

                        <!-- Modal -->
                        <div class="modal fade" id="id<?=$row[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a href="Eliminar.php?id=<?= $row[0]?>" class="btn btn-danger">Eliminar</a>
                                    <!-- <button type="button" >Eliminar</button> -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <a href="RegistroBeneficiarios.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar beneficiario
    </a>
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/footer.php");
?>
