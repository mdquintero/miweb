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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <style>
      body {
    background-image: url('../image/fondo_registro.jpg'); 
    background-size: cover; 
    background-position: absolute;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
}
    </style>
    <div class="container"> 
    
        <form id="contactus" action="store.php" method="post">
          <?php
                // Verifica si hay un error en la URL
                if (isset($_GET["error"]) && $_GET["error"] == 2) {
                    echo "<h6 style='color: red;'>Se ha presentado un error por favor revise los datos e intente de nuevo.</h6>";
                }
          ?>
        <center><h3>REGISTRAR</h3></center>
          
          <fieldset>
            <input placeholder="Codigo de juzgado" type="text" name="Codigo" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Ciudad" type="text" name="Ciudad" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Despacho" type="text" name="Despacho" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Juez" type="text" tabindex="3" name="Juez" required>
          </fieldset>
          <fieldset>
            <button name="btnregistrar" type="submit" id="contactus-submit" value="ok">Registrar</button>
            <center><a class="options" href="index.php">Volver a la tabla</a></center>
          </fieldset>
        
        </form>
      </div>
</body>
</html>