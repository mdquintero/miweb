<?php
    require_once ("c://xampp/htdocs/proyectotls/vista/Asesor/Head/head.php");
    require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();

    /**Uso de la función IndexAsesor */
    $rows = $obj->IndexAsesor();
    
?>


 <thead>
        <tr>
            <th scope="col">Correo</th> 
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Telefono</th>
            <th scope="col">Cargo</th>
            <th scope="col"># Radicado</th>
            <th scope="col">Fecha inicio</th>
            <th scope="col">Fecha fin</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Juzgado</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row['Correo'] ?></th>
                    <th><?= $row['Nombres'] ?></th>
                    <th><?= $row['Apellidos'] ?></th>
                    <th><?= $row['Telefono'] ?></th>
                    <th><?= $row['Cargo'] ?></th>
                    <th><?= $row['Codigo'] ?></th>
                    <th><?= $row['FechaInicio'] ?></th>
                    <th><?= $row['FechaFin'] ?></th>

                    <!-- Descripción Asesor -->
                    <th><a href="DescripcionProceso.php?id=<?= $row['Codigo'] ?>" class="btn btn-danger">Ver Descripción</a></th>
                    <th><a href="../Juzgado/mostrar.php?id=<?= $row['Juzgado']?>" class="btn btn-primary">Ver Juzgado</a></th>
                    
                    <!-- <th><a href="Editar.php?id=" class="btn btn-success">Modificar</a></th> -->
                    
                        
                        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="10" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>   
    <!-- <a href="CrearProceso.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar proceso jurídico
    </a>
    <a href="../Juzgado/index.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Juzgados
    </a> -->



<?php
require_once ("../Head/footer.php");
?>