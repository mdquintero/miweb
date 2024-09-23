<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Abogado/head/head.php");
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
<?php
require_once("c://xampp/htdocs/proyectotls/Vista/Abogado/head/footer.php");
?>
