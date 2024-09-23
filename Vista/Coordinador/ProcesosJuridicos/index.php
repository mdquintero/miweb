<?php
    require_once ("c://xampp/htdocs/proyectotls/vista/Coordinador/head/head.php");
    require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();
    $rows = $obj->Index();
?>


 <thead>
        <tr>
            <th scope="col">Numero de Radicado</th> 
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Estado</th>
            <th scope="col">Fecha Fin</th>
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
                    <th><?= $row[5] ?></th>
                    <th><?= $row[2] ?></th>
                    <th><a href="DescripcionProceso.php?id=<?= $row[0]?>" class="btn btn-danger">Ver Descripcion</a></th>
 
                    <th><a href="../Juzgado/mostrar.php?id=<?= $row[4]?>" class="btn btn-primary">Ver Juzgado</a></th>
                    <th>
                        <a href="../Usuarios/index.php?CodigoProceso=<?= $row[0]?>" class="btn btn-success btn-sm">Asignar</a>
                        <a href="../Usuarios/index.php?CodigoProceso=<?= $row[0]?>" class="btn btn-success btn-sm">Reasignar</a>
                        <a href="../Afiliados/index.php?Proceso=<?= $row[0]?>" class="btn btn-success  btn-sm">Vincular</a>
                    </th>
                    
                        
                        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>   
    <!-- <a href="CrearProceso.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar proceso jurídico
    </a> -->
    <a href="../Juzgado/index.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Juzgados
    </a>



<?php
 // Verifica si hay un mensaje en la URL
    if (isset($_GET["Mensaje"]) ) {
         if($_GET["Mensaje"] == "Error"){
            echo "<p style='color: red; text-align: center;'>Error: Asignación del proceso fallida.</p>";
        }
        else if($_GET["Mensaje"] == "Exito"){
            echo "<p style='color: green; text-align: center;'> Asignación del proceso exitosa.</p>";
        }else if ($_GET["Mensaje"] == 'YaVinculado'){
            echo "<p style='color: yellow; text-align: center;' >Advertencia: Ya se Vinculo el afiliado al proceso seleccionado.</p>";
            }
    }
require_once ("../Head/footer.php");
?>