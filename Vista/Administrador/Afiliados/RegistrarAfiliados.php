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
<html lang="en">
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
            background-image: url('../image/fondo_registro.jpg.jpeg'); 
            background-size: cover; 
            background-position: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
    </style>
    <div class="container"> 
    <form action="Tienda.php" id="contactus" method="post">
        <?php
                    // Verifica si hay un error en la URL
                    if (isset($_GET["error"]) && $_GET["error"] == 2) {
                        echo "<h6 style='color: red;'>Se ha presentado un error por favor revise los datos e intente de nuevo.</h6>";
                    }
        ?>
        <center><h3>REGISTRAR AFILIADOS</h3></center>
        <fieldset>
            <input placeholder="Numero de Identificacion" type="text" name="NumeroIdentificacion" tabindex="1" required>
        </fieldset>
        <fieldset>
            <!-- <input placeholder="Tipo de Identificacion" type="text" name="TipoIdentificacion" tabindex="1"> -->
            <select name="TipoIdentificacion" tabindex="1" required>
              <option selected>Seleccione el tipo de identificación</option>
              <option value="CC">CC</option>
              <option value="CE">CE</option>
              <option value="PEP">PEP</option>
            </select>
        </fieldset> 
        <fieldset>
            <!-- <input placeholder="Tipo de Contrato" type="text" name="TipoContrato" tabindex="1"> -->
            <select name="TipoContrato" tabindex="1" required>
              <option selected>Seleccione la modalidad laboral</option>
              <option value="Independiente">Independiente</option>
              <option value="Dependiente">Dependiente</option>
            </select>
        </fieldset> 
        <fieldset>
            <input placeholder="Fecha de Afiliacion" type="date" name="FechaAfiliacion" tabindex="1" required>
        </fieldset> 
        <fieldset>
            <input placeholder="Empresa" type="text" name="Empresa" tabindex="1" required>
        </fieldset> 
        <fieldset>
            <input placeholder="Nombres" type="text" name="Nombres" tabindex="1" required>
        </fieldset>
        <fieldset>
            <input placeholder="Apellidos" type="text" name="Apellidos" tabindex="1" required>
        </fieldset>
        <fieldset> 
            <input placeholder="Codigo del Usuario" type="text" name="CedulaUsuario" tabindex="1" required>
        </fieldset>
    
        <fieldset>
            <button name="btnregistrar" type="submit" id="contactus-submit" value="ok">Registrar</button>
            <center><a class="options" href="index.php">Volver a la tabla</a></center>
        </fieldset>
    </form>
</div>

