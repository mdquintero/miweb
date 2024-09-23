<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/head.php");
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
                    
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12" class="text-center">No hay registros actualmente</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <!-- <a href="RegistroBeneficiarios.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar beneficiario
    </a> -->
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Asesor/Head/footer.php");
?>
