<?php

require_once("c://xampp/htdocs/proyectotls/Controlador/AfiliadoControlador.php");
$obj = new AfiliadoControlador();

$NumeroIdentificacion = $_POST['NumeroIdentificacion'];
$TipoIdentificacion = $_POST['TipoIdentificacion'];
$TipoContrato = $_POST['TipoContrato'];
$FechaAfiliacion = $_POST['FechaAfiliacion'];
$Empresa = $_POST['Empresa'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$CedulaUsuario = $_POST['CedulaUsuario'];



$obj->guardar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario);

?>