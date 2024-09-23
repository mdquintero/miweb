<?php
 require_once "c://xampp/htdocs/proyectotls/Config/BaseDatos.php";
class ValidarSesion {

    private $codigo;
    private $usuario;
    private $contraseña;
    private $Rol;

    private $Nombres;
    private $conexion;

    public function __construct($usuario, $contraseña) {
       
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $con = new BaseDatos();
        $this->conexion = $con->conexion();
    }

    public function validar() {
        $consulta = "SELECT * FROM tblusuarios WHERE Usuario = '$this->usuario'";
        $resultado = $this->conexion->query($consulta);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $this->Rol = $usuario['Rol'];
        $this->codigo = $usuario['Codigo'];
        $this->Nombres = $usuario['Nombres'];
        session_start();
        $_SESSION['Contraseñahash'] = $usuario['Contraseña'];
        // && password_verify($this->contraseña, $ContraseñaHash)
    
        if ($usuario) {
            $ContraseñaHash = $usuario['Contraseña'];
            if (password_verify($this->contraseña, $ContraseñaHash)) {
                // Si se encontró un usuario con las credenciales proporcionadas
                $this->Rol = $usuario['Rol'];
                $this->codigo = $usuario['Codigo'];
                $this->Nombres = $usuario['Nombres'];
                $_SESSION['Rol'] = $this->Rol;
                $_SESSION['Codigo'] = $this->codigo;
                $_SESSION['Nombres'] = $this->Nombres;

                return true;
            } else {
                return false;

            }
            
        } else {
            return false;
        }
    }
    
}


?>