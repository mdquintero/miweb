<?php
    // seguridad de paginación
    session_start();
    $varsesion= $_SESSION['Codigo'];
    if($varsesion== null || $varsesion=''){
        header("location:http://localhost/proyectotls/Vista/login.php");
        die();
    }
    require_once("c://xampp/htdocs/proyectotls/controlador/BeneficiarioControlador.php");
    $obj = new BeneficiarioControlador();
    $user = $obj->Mostrar($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar empleados</title>
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
            <center><h2>MODIFICAR BENEFICIARIOS</h2></center>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">NumeroIdentificacion</label>
                <input type="text" id="exampleFormControlInput1" name="NumeroIdentificacion" value="<?= $user[0]?>" readonly>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nombres</label>
                <input type="text" id="exampleFormControlInput1" name="Nombres" value="<?= $user[1]?>" required>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Apellidos</label>
                <input type="text" id="exampleFormControlInput1" name="Apellidos" value="<?= $user[2]?>" required>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">TipoIdentificacion</label>
                <input type="text" id="exampleFormControlInput1" name="TipoIdentificacion" value="<?= $user[3]?>" required>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">Parentesco</label>
                <input type="text" id="exampleFormControlInput1" name="Parentesco" value="<?= $user[4]?>" required>
            </div>
            <div class="form-group">
            <label for="staticEmail" class="col-sm-2 col-form-label">NumIdentificacionAfiliado</label>
                <input type="text" id="exampleFormControlInput1" name="NumIdentificacionAfiliado" value="<?= $user[5]?>" required>
            </div>
                <center><input type="submit" id="submit-btn" value="Guardar cambios"></center>
                <br>
                <center><input type="submit" id="submit-btn" href="index.php?id=<?= $user[0]?>" value="Cancelar"></center>
            </div>
            
        </form>
    </div>
</body>
</html>