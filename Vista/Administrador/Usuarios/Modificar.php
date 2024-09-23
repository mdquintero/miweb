<?php
    require_once ("../../../Controlador/UsuarioControlador.php");
    $Obj = new UsuarioControlador();
    $Codigo = $_POST['Codigo'];
    $Correo = $_POST['Correo'];
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['Contraseña'];
    $Rol = $_POST['Rol'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Cargo = $_POST['Cargo'];
    $NumeroTarjetaProfesional = $_POST['NumeroTarjetaProfesional'];
    $Cedula = $_POST['Cedula'];
    $Obj->Modificar($Codigo, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula);


?>