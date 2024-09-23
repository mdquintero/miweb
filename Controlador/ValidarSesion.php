<?php

require_once "../Controlador/ValidarSesionControlador.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    
    $SesionControlador = new SesionControlador();
    $sesionIniciada = $SesionControlador->iniciarSesion($usuario, $contraseña);
     
    
    if ($sesionIniciada) {
        
        
        // echo "Inicio de sesión exitoso.
        
        
        if($_SESSION['Rol'] == 1){ //administrador
            header("location:../Vista/Administrador/Usuarios/index.php");
        } elseif($_SESSION['Rol'] == 2){ //Coordinador de área
            header("location:../Vista/Coordinador/Usuarios/index.php"); 
        }elseif($_SESSION['Rol'] == 3){ //abogado
            header("location:../Vista/Abogado/ProcesosJuridicos/index.php"); 
        }elseif($_SESSION['Rol'] == 4){ //secretari@
                header("location:../Vista/Secretario/ProcesosJuridicos/index.php");
        }elseif($_SESSION['Rol'] == 5){ //asesor
            header("location:../Vista/Asesor/ProcesosJuridicos/index.php"); 
        }else{
            echo "ERROR";
        }
    
        
        
        
        

       
    } else {
        // Redirige a la página de inicio de sesión con un mensaje de error
        header("Location: ../Vista/login.php?error=1");
    }
    
}
?>