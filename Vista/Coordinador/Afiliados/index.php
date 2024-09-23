<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/AfiliadoControlador.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");
$ObjB = new BeneficiarioControlador();
$obj = new AfiliadoControlador();
$rows = $obj->index();

?>
 <thead>
        <tr>
            <th scope="col">Número <br> Identificacion</th>
            <th scope="col">Tipo <br> Identificacion</th>
            <th scope="col">Mod <br> laboral</th>
            <th scope="col">Fecha <br> Afiliacion</th>
            <th scope="col">Empresa</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Código <br> Usuario</th>
            <th scope="col">Beneficiario</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
         if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row[0] ?></th>
                    <th><?= $row[1] ?></th>
                    <th><?= $row[2] ?></th>
                    <th><?= $row[3] ?></th>
                    <th><?= $row[4] ?></th>
                    <th><?= $row[5] ?></th>
                    <th><?= $row[6] ?></th>
                    <th><?= $row[7] ?></th>
                    <?php

                    $CodigoB = $ObjB->getCodigo($row[0]);
                     if($CodigoB): ?>
                        
                        <th><a href="../Beneficiarios/Mostrar.php?id=<?= $CodigoB ?>" class="btn btn-primary">Beneficiario</a></th>
                            
                    <?php else: ?>
                        <th>
                            No existe
                        </th>
                    <?php endif; ?>                     
                    <th>
                        <a href="Mostrar.php?id=<?= $row[0]?>" class="btn btn-success  btn-sm">Procesos</a>
                        <?php
                            if( isset($_GET['Proceso'])){
                            $CodigoProceso = $_GET['Proceso'];
                        ?>
                        <a href="Vinculacion.php?Numero=<?= $row[0]?> &Proceso=<?=$CodigoProceso?>" class="btn btn-success  btn-sm">Vincular</a>
                        <?php
                            }
                        ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
<?php
// Verifica si hay un mensaje en la URL
if (isset($_GET["Mensaje"]) ) {
    if($_GET["Mensaje"] == "Error"){
       echo "<p style='color: red; text-align: center;'>Error: Asignación del proceso fallida.</p>";
   }
   else if($_GET["Mensaje"] == "Exito"){
       echo "<p style='color: green; text-align: center;'> Asignación del proceso exitosa.</p>";
   }
}
require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/footer.php");
?>