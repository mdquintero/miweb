<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /*Maneja la portada de la iamgen de presentación*/
        #mi-body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        /*Maneja el movimieto de la imagen*/
        #contenedor {
            height: 100%;
            background-image: url('../image/fondo_I.png');
            background-size: cover; 
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        /*Hace que la imagen se vea un poco borrosa*/
        #blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(4px);
        }
        /*Maneja el movimiento de Inicio se Sesión*/
        #inicio {
        position: absolute;
        top: 40%;
        left: 45%;
        transform: translate(-50%, -50%);
       
        padding: 20px;
        border-radius: 100px;
    }
    </style>
</head>
<body id="mi-body" >
<div id="contenedor">
    <div id="blur-overlay"></div> <!-- Filtro de desenfoque -->
    <div id="inicio">
        <center>
            <img src="../image/logo2.png" alt="Logo de tu sitio" class="logo5">
            <?php
                // Verifica si hay un error en la URL
                if (isset($_GET["error"]) && $_GET["error"] == 1) {
                    echo "<p style='color: red;'>Error: Nombre de usuario o contraseña incorrectos.</p>";
                }
            ?>

            <h2 style="font-family: Felix Titling, sans-serif;">Inicio De Sesión</h2>

            <form action="../../../Controlador/ValidarSesion.php" method="post">
                <center><label for="nombre" class="color-blanco">Usuario</label></center>
                <center><input type="text" name="usuario" required><br><br></center>
                <center><label for="password" class="color-blanco">Contraseña</label></center>
                <center><input type="password" name="contraseña" required><br><br></center>
                <br>
                <center><button class="btn btn-primary Iniciar_Sesion"><span>Iniciar Sesión</span></button></center>
            </form>
            <br>
            <u><a href="recuperar_contraseña.php">¿Olvidaste la contraseña?</a></u>
        </center>
    </div>
</div> 

</body>
</html>