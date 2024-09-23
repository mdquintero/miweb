<?php
require_once ("../Head/head.php");
require_once ("../../../Controlador/UsuarioControlador.php");
$Obj = new UsuarioControlador();
$Filas = $Obj->HistorialJuridico($_GET['id']);
$Usuario = $Obj->mostrar($_GET['id']);

?>

<thead>
        <tr>
            <th scope="col">Numero de Radicado</th> 
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Juzgado</th>
            
        </tr>
    </thead>
    <tbody>
        <?php if($Filas): ?>
            <?php foreach($Filas as $Fila): ?>
                <tr>
                    <th><?= $Fila[0] ?></th>
                    <th><?= $Fila[1] ?></th>
                    <th><?= $Fila[2] ?></th>
                    <th><a href="#" class="btn btn-danger">Ver Descripcion</a></th>      
                    <th><a href="../Juzgado/mostrar.php?id=<?= $Fila[4]?>" class="btn btn-primary">Ver Juzgado</a></th>
                    <!-- <th><a href="Editar.php?id=" class="btn btn-success">Modificar</a></th> -->
                    <div class="container text-left"></div>
            <?php endforeach; ?> 
                   
                            
                        
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <p>
                        <div class="row">
                        <div class="col-3">
                        Código: <?= $Usuario['Codigo']  ?>
                            <br>
                            Abogado: <?= $Usuario['Nombres']  ?>
                            <?= $Usuario['Apellidos']  ?>
                            

                            </div>
                            
                            
                            <div class="col-3">
                            Usuario: <?= $Usuario['Usuario']  ?>
                            <br>
                            Correo: <?= $Usuario['Correo']  ?>
                            </div>
                        </div>
                    </p>  
        
    

      
                   
                
                 

<?php
require_once ("../Head/footer.php");
?>