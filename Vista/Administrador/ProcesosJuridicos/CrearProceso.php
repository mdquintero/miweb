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
    <title>Registrar Proceso Juridico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <style>
      body {
    background-image: url('https://i.ibb.co/Ltdws0F/fondo-registro-jpg.jpg'); 
    background-size: cover; 
    background-position: absolute;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
}
    </style>
    <div class="container"> 
    
        <form id="contactus" action="Tienda.php" method="post">
          <?php
                // Verifica si hay un error en la URL
            if (isset($_GET["error"]) && $_GET["error"] == 2) {
            echo "<h6 style='color: red;'>Se ha presentado un error por favor revise los datos e intente de nuevo.</h6>";
            }
          ?>
          <center><h3>REGISTRAR</h3></center>
          
          <fieldset>
            <input placeholder="Numero de Radicado" type="text" name="Radicado" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Fecha de Inicio" type="date" name="Fechain" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Fecha de Fin" type="date" name="Fechafin" tabindex="1" >
          </fieldset>
          <fieldset>
            <input placeholder="Descripcion del Proceso" type="text" name="Descripcion" tabindex="1" required>
          </fieldset>
          <fieldset>
            <input placeholder="Numero de Juzgado" type="text" tabindex="3" name="Juzgado" required>
          </fieldset>
          <fieldset>
            <button name="btnregistrar" type="submit" id="contactus-submit" value="ok">Registrar</button>
            <center><a class="options" href="index.php">Volver a la tabla</a></center>
          </fieldset>
        
        </form>
      </div>
</body>
</html>