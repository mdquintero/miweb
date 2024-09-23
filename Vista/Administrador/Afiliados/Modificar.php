<?php
    require_once("c://xampp/htdocs/proyectotls/controlador/AfiliadoControlador.php");
    $obj = new AfiliadoControlador();
    $obj->Modificar($_POST['NumeroIdentificacion'],$_POST['TipoIdentificacion'],$_POST['TipoContrato'],$_POST['FechaAfiliacion'],$_POST['Empresa'],$_POST['Nombres'],$_POST['Apellidos'],$_POST['CedulaUsuario']);

?>