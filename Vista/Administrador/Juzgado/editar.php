<?php
    // seguridad de paginación
    session_start();
    $varsesion= $_SESSION['Codigo'];
    if($varsesion== null || $varsesion=''){
        header("location:http://localhost/proyectotls/Vista/login.php");
        die();
    }
    require_once("c://xampp/htdocs/proyectotls/Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $user = $obj->show($_GET['id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div id="modi">
        <form action="update.php" method="post">
        <?php
        
        ?>
            <center><h2>MODIFICAR</h2></center>
            <div class="form-group">  
                <input type="text" id="exampleFormControlInput1" value="<?=$user['Codigo']?>" name="Codigo" placeholder="Codigo de juzgado" readonly>
            </div>
            <div class="form-group">  
                <input type="text" id="exampleFormControlInput1" value="<?=$user['Ciudad']?>" name="Ciudad" placeholder="Ciudad" required>
            </div>
            <div class="form-group">
                <input type="text" id="exampleFormControlInput1" value="<?=$user['Despacho']?>" name="Despacho" placeholder="Despecho" required>
            </div>
            <div class="form-group">
                <input type="text" id="exampleFormControlInput1" value="<?=$user['Juez']?>" name="Juez" placeholder="Nombre Juez" required>
            </div>
            
                <center><input type="submit" id="submit-btn" value="Guardar cambios" name="btnmodificar"></center>
                <center><a class="options" href="Index.php">Volver a la tabla</a></center>
            </div>
            
        </form>
    </div>
</body>
</html>
