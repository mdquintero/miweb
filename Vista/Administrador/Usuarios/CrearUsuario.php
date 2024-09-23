<?php
    // seguridad de paginación
    session_start();
    $varsesion= $_SESSION['Codigo'];
    if($varsesion== null || $varsesion=''){
        header("location:http://localhost/proyectotls/Vista/login.php");
        die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <style>
      body {
    background-image: url('../../image/fondo_registro.jpg.jpeg'); 
    background-size: cover; 
    background-position: absolute;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
}
    </style><div class="container-fluid"> 
        <form id="registro-form" class="row g-3" action="tienda.php" method="post" >
            <?php
                // Verifica si hay un error en la URL
                if (isset($_GET["error"]) && $_GET["error"] == 2) {
                    echo "<h6 style='color: red;'>Se ha presentado un error por favor revise los datos e intente de nuevo.</h6>";
                }
            ?>
            <center><h3>REGISTRAR</h3></center>
            <div class="col-md-4">
                <input placeholder="Codigo de usuario" type="text" name="Codigo" tabindex="1" required>
            </div>
            <div class="col-12"></div>
            <div class="col-md-3">
                <input placeholder="Nombre de usuario" type="text" name="Usuario" tabindex="1" required>
            </div>
            <div class="col-md-3">
                <input placeholder="Contraseña" type="text" name="Contraseña" tabindex="1" required>
            </div>
            <div class="col-md-4">
                <input placeholder="Correo Electronico" type="email" name="Correo" tabindex="1" required>
            </div>
            <div class="col-12"></div>
            <div class="col-md-5">
                <select name="Rol">
                    <option selected>Seleccione el rol</option >
                    <option value="1">Administrador(a)</option>
                    <option value="2">Coordinador(a) de área</option>
                    <option value="3">Abogad@</option>
                    <option value="4">Secreatr@</option>
                    <option value="5">Asesor(a)</option>
                </select>
            </div>
            <div class="col-12"></div>
            <div class="col-md-4">
                <input placeholder="Nombres" type="text" name="Nombres" tabindex="1" required>
            </div>
            <div class="col-md-4">
                <input placeholder="Apellidos" type="text" name="Apellidos" tabindex="1" required>
            </div>
            <div class="col-md-4">
                <input placeholder="Fecha Nacimiento" type="date" name="FechaNacimiento" tabindex="1" required>
            </div>
            <div class="col-12"></div> 
            <div class="col-md-5"> 
                <input placeholder="Direccion" type="text" name="Direccion" tabindex="1" required>
            </div>
            <div class="col-md-4">
                <input placeholder="Telefono" type="text" name="Telefono" tabindex="1" required>
            </div>
            <div class="col-12"></div>
            <div class="col-md-4">
                <input placeholder="Cargo" type="text" name="Cargo" tabindex="1" required>
            </div>
            <div class="col-md-4">
                <input placeholder="Numero Tarjeta Profesional" type="text" name="NumeroTarjetaProfesional" tabindex="1" >
            </div>
            <div class="col-12"></div>
            <div class="col-md-5">
                <input placeholder="Cedula" type="text" name="Cedula" tabindex="1" required>
            </div>
            <div class="col-12">
                <button name="btnregistrar" type="submit" class="btn btn-success" value="ok">Registrar</button>
            </div>
            <center><a class="btn btn-link" href="index.php">volver a la tabla</a></center>
        </form>
    </div>
</body>
</html>