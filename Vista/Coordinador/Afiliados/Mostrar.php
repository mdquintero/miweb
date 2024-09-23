<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/head.php");
require_once("c://xampp/htdocs/proyectotls/controlador/AfiliadoControlador.php");

$obj = new AfiliadoControlador();
$Afiliado = new AfiliadoControlador();
$Dato = $Afiliado->Mostrar($_GET['id']);
$rows = $obj->MostrarProcesos($_GET['id']);  
?>
 <p>
     <div class="row">
        <div class="col-3">
            Número de  identificación: <?= $Dato['TipoIdentificacion']?> <?= $Dato['NumeroIdentificacion']?>
                <br>
            Nombre completo: <?= $Dato['Nombres']?> <?= $Dato['Apellidos']?> 
                <br>
            Fecha de afiliación: <?= $Dato['FechaAfiliacion']?>  

        </div>
                            
                            
        <div class="col-3">            
            Modalidad loaboral: <?= $Dato['TipoContrato']?>
                <br>
            Empresa: <?= $Dato['Empresa']?>
            
        </div>
    </div>                      
<thead>
        
        <tr>
            <th scope="col">Numero de Radicado</th> 
            <th scope="col">Fecha de Inicio</th>
            <th scope="col">Fecha de Fin</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Juzgado</th>
        </tr>
    </thead>

    <tbody>
                        
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                    <tr>
                        <th><?= $row['Codigo'] ?></th>
                        <th><?= $row['FechaInicio'] ?></th>
                        <th><?= $row['FechaFin'] ?></th>
                        <th><a href="#" class="btn btn-danger">Ver Descripcion</a></th>      
                        <th><a href="../Juzgado/mostrar.php?id=<?= $row['Juzgado']?>" class="btn btn-primary">Ver Juzgado</a></th>
                            
            <?php endforeach; ?>
        <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay registros actualmente</td>
                </tr>
            <?php endif; ?>
                        
</tbody>
<center> <form action="index.php"><button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                    </svg>
                    Volver a la tabla
                </button></form></center>

    
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/footer.php");
?>
