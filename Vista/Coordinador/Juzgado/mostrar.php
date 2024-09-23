<?php
    require_once("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/head.php");
    require_once("c://xampp/htdocs/proyectotls/Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $date = $obj->show($_GET['id']);
?>
 <thead>
        <tr>
            <th scope="col">Codigo</th> 
            <th scope="col">Ciudad</th>
            <th scope="col">Despacho</th>
            <th scope="col">Juez</th>
            <th scope="col">MODIFICAR</th>
        </tr>
    </thead>

    <tbody>
                        
        <tr>
            <td><?= $date[0] ?></td>
            <td><?= $date[1] ?></td>
            <td><?= $date[2] ?></td>
            <td><?= $date[3] ?></td>
            <td><a class="btn btn-success" href="Editar.php?id=<?= $date[0] ?>">Modificar</a></td>
        </tr>
                        
    </tbody>
    <center> <form action="index.php"><button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z"/>
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708z"/>
                    </svg>
                    Ver Juzgados
                </button></form></center>

<?php
require_once ("c://xampp/htdocs/proyectotls/Vista/Coordinador/head/footer.php");
?>