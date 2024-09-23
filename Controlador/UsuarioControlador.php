<?php

class UsuarioControlador {
    private $modelo;

    public function __construct() {
        require_once("c://xampp/htdocs/proyectotls/Modelo/UsuarioModelo.php");
        $this->modelo = new UsuarioModelo();
    }

    public function guardar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula) {
        $id = $this->modelo->insertar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula);
        return ($id === false) ? header("Location: CrearUsuario.php") : header("Location: Mostrar.php?id=".$CodigoUsuario);
    }

    public function mostrar($CodigoUsuario) {
        $usuario = $this->modelo->mostrar($CodigoUsuario);
        return ($usuario !== false) ? $usuario : header("Location: index.php");
    }

    public function index() {
        return $this->modelo->index();
    }

    public function indexCoordinador() {
        return $this->modelo->indexCoordinador();
    }

    public function modificar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula) {
        $id = $this->modelo->modificar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula);
        return ($id !== false) ? header("Location: Mostrar.php?id=".$CodigoUsuario) : header("Location: index.php");
    }

    public function eliminar($CodigoUsuario) {
        return ($this->modelo->eliminar($CodigoUsuario)) ? header("Location: index.php") : header("Location: Mostrar.php?id=".$CodigoUsuario);
    }

    public function historialJuridico($CodigoUsuario) {
        return $this->modelo->historialJuridico($CodigoUsuario);
    }

    public function asignarProceso($CodigoProceso, $CodigoUsuario) {
        if ($this->modelo->verificarAsignacion($CodigoProceso, $CodigoUsuario)) {
            return header("Location: index.php?Mensaje=YaAsignado");
        } else {
            $resultado = $this->modelo->asignarProceso($CodigoProceso, $CodigoUsuario);
            return ($resultado === false) ? header("Location: ../ProcesosJuridicos/index.php?Mensaje=Error") : header("Location: ../ProcesosJuridicos/index.php?Mensaje=Exito");
        }
    }

    public function reasignarProceso($CodigoProceso, $CodigoUsuario) {
        if ($this->modelo->verificarAsignacion($CodigoProceso, $CodigoUsuario)) {
            return header("Location: index.php?Mensaje=YaAsignado");
        } else {
            $resultado = $this->modelo->reasignarProceso($CodigoProceso, $CodigoUsuario);
            return ($resultado === false) ? header("Location: ../ProcesosJuridicos/index.php?Mensaje=Error") : header("Location: ../ProcesosJuridicos/index.php?Mensaje=Exito");
        }
    }
}
?>
