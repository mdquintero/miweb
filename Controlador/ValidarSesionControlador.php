<?php
require_once "C:/xampp/htdocs/proyectotls/Modelo/ValidarSesionModelo.php";

class SesionControlador {
    
    
    public function iniciarSesion($usuario, $contraseña) {
        $Usuario = new ValidarSesion($usuario, $contraseña);  
        return $Usuario->validar();
    }

    public function CerrarSesion(){
       session_start();
        // Destruye todas las variables de sesión.
        $_SESSION = array();
        // Finalmente, destruye la sesión.
        session_destroy();
        // Redirige a la página de inicio de sesión 
        header("Location: login.php");
        exit();
    }

   
    
}


?>