<?php
    require_once ("c://xampp/htdocs/proyectotls/vista/Abogado/head/head.php");
    require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();
    $rows = $obj->IndexAbogado();
    echo  $_SESSION['Codigo'];
?>


 <thead>
        <tr>
            <th scope="col">Numero de Radicado</th> 
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Estado</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Juzgado</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row[0] ?></th>
                    <th><?= $row[1] ?></th>
                    <th>
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm" type="button">
                        <?= $row[5] ?>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="EditarEstado.php?id=<?= $row['Codigo'] ?>&Estado=Inactivo">Inactivar</a></li>
                        <li><a class="dropdown-item" href="EditarEstado.php?id=<?= $row['Codigo'] ?>&Estado=Archivado">Archivar</a></li>
                        </ul>
                    </div>
                        
                    </th>
                    <th><a href="DescripcionProceso.php?id=<?= $row['Codigo'] ?>" class="btn btn-danger">Ver Descripción</a></th>     
                    <th><a href="../Juzgado/index.php?id=<?= $row[4]?>" class="btn btn-primary">Ver Juzgado</a></th>
                    
                    
                        
                        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>   
    <a href="../Juzgado/index.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Juzgados
    </a>



<?php
require_once ("../Head/footer.php");
?>