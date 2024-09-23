<?php
require_once 'C:\xampp\htdocs\proyectotls\Controlador\ContraseñaControlador.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['CorreoRec'];
    $nuevaContraseña = $_POST['ContraseñaRec'];
    var_dump($correo);
    var_dump($nuevaContraseña);
    $controlador = new ContraseñaControlador();
    $controlador->cambiarContraseña($correo, $nuevaContraseña);
    
}
?>
