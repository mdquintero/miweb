<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/head.php");
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
        <th scope="col">Acciones</th>
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
                <th>
                    <a href="editar.php?id=<?=$row[0]?>" class="btn btn-success">Modificar</a>
                </th>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No hay registros</td>
        </tr>
    <?php endif; ?>
</tbody>
<a href="crear.php" class="btn btn-transparent">
        <i class="fa-solid fa-file-arrow-up"></i> Agregar juzgado
    </a>
<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Administrador/head/footer.php");
?>