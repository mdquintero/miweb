<?php
    require_once("c://xampp/htdocs/proyectotls/controlador/BeneficiarioControlador.php");
    $obj = new BeneficiarioControlador();
    $obj->Eliminar($_GET['id']);
?>