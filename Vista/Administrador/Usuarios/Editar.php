<?php
  // seguridad de paginación
  session_start();
  $varsesion= $_SESSION['Codigo'];
  if($varsesion== null || $varsesion=''){
      header("location:http://localhost/proyectotls/Vista/login.php");
      die();
    }
    require_once ("../../../Controlador/UsuarioControlador.php");
    $Obj = new UsuarioControlador();
    $Usuario = $Obj->mostrar(($_GET['id']));
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar usuario</title>
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
    
    <div class="col-md-6 offset-md-3  p-4"> 
        
        <form id="registro-form" class="row g-3 " action="Modificar.php" method="post">
    
        <center><h4 style="color: white;">Modificar usuario</h4></center>

        
        <div class="col-md-3">
            <input placeholder="Codigo de usuario" type="text" name="Codigo" tabindex="1" value="<?= $Usuario['Codigo'] ?>" readonly>
        </div>
        <div class="col-12"></div>
        <div class="col-md-5">
            <input placeholder="Nombre de usuario" type="text" name="Usuario" tabindex="1" value="<?= $Usuario['Usuario'] ?>" required>
        </div>
        <div class="col-md-5">
            <input placeholder="Contraseña" type="password" name="Contraseña" tabindex="1" value="<?= $Usuario['Contraseña'] ?>" required>
        </div>
        <div class="col-md-5">
            <input placeholder="Correo Electronico" type="email" name="Correo" tabindex="1" value="<?= $Usuario['Correo'] ?>" required>
        </div>
        <div class="col-12"></div>
        <div class="col-md-3">
            <input placeholder="Rol" type="text" name="Rol" tabindex="1" value="<?= $Usuario['Rol'] ?>" readonly>

            
        </div>
        <div class="col-12"></div>
        <div class="col-md-5">
            <input placeholder="Nombres" type="text" name="Nombres" tabindex="1" value="<?= $Usuario['Nombres'] ?>" required>
        </div>
        <div class="col-md-4">
            <input placeholder="Apellidos" type="text" name="Apellidos" tabindex="1" value="<?= $Usuario['Apellidos'] ?>" required>
        </div>
        <div class="col-md-3">
            <input placeholder="Fecha Nacimiento" type="date" name="FechaNacimiento" tabindex="1" value="<?= $Usuario['FechaNacimiento'] ?>" required>
        </div>
        <div class="col-12"></div> 
        <div class="col-md-5"> 
            <input placeholder="Direccion" type="text" name="Direccion" tabindex="1" value="<?= $Usuario['Direccion'] ?>"required>
        </div>
        <div class="col-md-4">
            <input placeholder="Telefono" type="text" name="Telefono" tabindex="1" value="<?= $Usuario['Telefono'] ?>" required>
        </div>
        <div class="col-12"></div>
        <div class="col-md-4">
            <input placeholder="Cargo" type="text" name="Cargo" tabindex="1" value="<?= $Usuario['Cargo'] ?>" required>
        </div>
        <div class="col-md-4">
            <input placeholder="Numero Tarjeta Profesional" type="text" name="NumeroTarjetaProfesional" tabindex="1" value="<?= $Usuario['NumeroTargetaProfesional'] ?>" required>
        </div>
        <div class="col-12"></div>
        <div class="col-md-4">
            <input placeholder="Cedula" type="text" name="Cedula" tabindex="1" value="<?= $Usuario['Cedula'] ?>" required>
        </div>
        <div class="col-12">
            <button name="btnregistrar" type="submit" class="btn btn-success" value="ok">Guardar</button>
        </div>
        <div class="col-6"></div>
            <center><a class="btn btn-link" href="index.php">Volver a la tabla</a></center>
        
        
        </form>
    </div>
    
</body>
</html>


