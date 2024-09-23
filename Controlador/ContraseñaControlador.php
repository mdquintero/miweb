<?php
require_once 'C:\xampp\htdocs\proyectotls\Modelo\ContraseñaModelo.php';

class ContraseñaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new ContraseñaModelo();
    }

    public function cambiarContraseña($correo, $nuevaContraseña) {
        if ($this->modelo->verificarCorreo($correo)) {
            $this->modelo->cambiarContraseña($correo, $nuevaContraseña);
            header("Location: FormularioContraseña.php?mensaje=contraseña_cambiada");
        } else {
            header("Location: FormularioContraseña.php?mensaje=correo_invalido");
        }
    }
}
?>
