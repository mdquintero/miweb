<?php
require_once("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");

$obj = new ProcesosJuridicosControlador();
$id = $_GET['id'];
$proceso = $obj->ObtenerProcesoPorId($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción del Proceso Jurídico</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body id="fon">
    <center><div id="custom-container" class="">
        <center><h2>Descripción del Proceso Jurídico</h2></center>
        <div id="custom-card" class="card">
            <center><div id="custom-card-header" class="card-header">
               Numero de Radicado #<?= $proceso['Codigo'] ?>
            </div></center>
            <div id="custom-card-body" class="card-body">
                <center><h5 id="custom-card-title" class="card-title">Descripción</h5></center>
                <p class="card-text"><?= $proceso['Descripcion'] ?></p>
                
                <!-- <form action="Editar.php" method="GET">
    <input type="hidden" name="id" value=""
    <button type="submit" id="custom-btn-primary" class="btn btn-link">Actualizar Descripción</button> -->
    <br>
    <a href="index.php" id="custom-btn-primary" class="btn btn-link">Volver</a>


            </div>
        </div>
    </div></center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
