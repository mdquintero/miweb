<?php
    require_once ("../Head/head.php");
    require_once ("../../../Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $rows = $obj->Index();
?>

<thead>
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Despacho</th>
        <th scope="col">Juez</th>
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
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No hay registros</td>
        </tr>
    <?php endif; ?>
</tbody>
<?php
    require_once ("../Head/footer.php");
?>