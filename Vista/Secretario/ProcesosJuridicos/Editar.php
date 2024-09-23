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
    <title>Editar Proceso Juridico</title>
</head>
<body>
<style>
        body {
            background-image: url('../image/fondo_registro.jpg.jpeg'); 
            background-size: cover; 
            background-position: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
    <div id="modi">
            <form action="Modificar.php" method="post" autocomplete="off">
            <center><h2>MODIFICAR</h2></center>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Codigo</label>
                <input type="text" id="exampleFormControlInput1" name="Codigo" value="<?= $user[0]?>" readonly>
            </div>
            <div class="form-group">
            <label for="staticEmxil" class="col-sm-2 col-form-label">Fecha de Inicio</label>
                <input type="text" id="exampleFormControlInput1" name="Fechain" value="<?= $user[1]?>" readonly>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha de Fin</label>
                <input type="text" id="exampleFormControlInput1" name="Fechafin" value="<?= $user[2]?>" required>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                <input type="text" id="exampleFormControlInput1" name="Descripcion" value="<?= $user[3]?>" readonly>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Juzgado</label>
                <input type="text" id="exampleFormControlInput1" name="Juzgado" value="<?= $user[4]?>" required>
            </div>
            <center><input type="submit" id="submit-btn" value="Guardar cambios"></center>
                <br>
                <center><input type="submit" id="submit-btn" href="index.php?id=<?= $user[0]?>" value="Cancelar"></center>
            </div>
            
        </form>
    </div>
</body>
</html>

