<?php

require_once("c://xampp/htdocs/proyectotls/Controlador/BeneficiarioControlador.php");
$obj = new BeneficiarioControlador();

$NumeroIdentificacion = $_POST['NumeroIdentificacion'];
$Nombres = $_POST['Nombres'];
$Apellidos = $_POST['Apellidos'];
$TipoIdentificacion = $_POST['TipoIdentificacion'];
$Parentesco = $_POST['Parentesco'];
$NumIdentificacionAfiliado = $_POST['NumIdentificacionAfiliado'];



$obj->guardar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado);

?>