<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/head.php");
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
            <!-- <th scope="col">Acciones</th> -->
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
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
    
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/footer.php");
?>