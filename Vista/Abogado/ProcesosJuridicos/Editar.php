<?php
    require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();
    $user = $obj->Mostrar($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <title>Editar Proceso Juridico</title>
</head>
<body>
<style>
        body {
            background-image: url('../image/fondo_registro.jpg.jpeg'); 
            background-size: cover; 
            background-position: absolute;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
</style>

<div class="container-fluid" id="contenido">
    <form class="row g-3" action="Modificar.php" method="post" autocomplete="off">
        <div class="col-12 text-center">
            <h2>Modificar</h2>
        </div>

        <div class="col-md-2">
            <center><label for="Codigo" class="form-label">Código</label></center>
            <input type="text" class="form-control" id="Codigo" name="Codigo" value="<?= $user[0] ?>" readonly>
        </div>

        <div class="col-md-4">
        <center><label for="Fechain" class="form-label">Fecha de Inicio</label></center>
            <input type="text" class="form-control" id="Fechain" name="Fechain" value="<?= $user[1] ?>" readonly>
        </div>

        <div class="col-md-4">
        <center><label for="Fechafin" class="form-label">Fecha de Fin</label></center>
            <input type="text" class="form-control" id="Fechafin" name="Fechafin" value="<?= $user[2] ?>" readonly>
        </div>

        <div class="col-md-4">
            <center><label for="Juzgado" class="form-label">Juzgado</label></center>
            <input type="text" class="form-control" id="Juzgado" name="Juzgado" value="<?= $user[4] ?>" readonly>
        </div>

        <div class="col-12">
            <center><label for="Descripcion" class="form-label">Descripción</label></center>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="4"><?= $user[3] ?></textarea>
        </div>

        <div class="col-12 text-center mt-3">
            <input type="submit" class="btn btn-primary" id="submit-btn" value="Guardar cambios">
            <br>
            <a href="index.php?id=<?= $user[0] ?>" class="btn btn-secondary ms-2" id="cancel-btn">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>

