<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Abogado/head/head.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/AfiliadoControlador.php");
require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");
//Controlador de beneficiario
$ObjB = new BeneficiarioControlador();
//Objeto del beneficiario
$DatosB = $ObjB->index();
$obj = new AfiliadoControlador();
$rows = $obj->index();
?>
 <thead>
        <tr>
            <th scope="col">Numero de Identificacion</th>
            <th scope="col">Tipo de Identificacion</th>
            <th scope="col">Tipo de Contrato</th>
            <th scope="col">Fecha de Afiliacion</th>
            <th scope="col">Empresa</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Cedula del Usuario</th>
            <th scope="col">Beneficiario</th>
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

                    <!-- Codigo para el boton de beneficiario -->
                    <?php
                    $CodigoB = $ObjB->getCodigo($row[0]);
                    if($CodigoB): ?>

                                <th><a href="../Beneficiarios/Mostrar.php?id=<?= $CodigoB ?>" class="btn btn-primary">Beneficiario</a></th>

                    <?php else: ?>
                        <th>
                            No existe
                        </th>
                    <?php endif; ?>   
                    <!-- ---------->

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Abogado/head/footer.php");
?>