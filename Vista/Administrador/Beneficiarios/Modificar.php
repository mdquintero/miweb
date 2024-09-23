<?php
    require_once("c://xampp/htdocs/proyectotls/controlador/BeneficiarioControlador.php");
    $obj = new BeneficiarioControlador();
    $obj->Modificar($_POST['NumeroIdentificacion'],$_POST['Nombres'],$_POST['Apellidos'],$_POST['TipoIdentificacion'],$_POST['Parentesco'],$_POST['NumIdentificacionAfiliado']);

?>