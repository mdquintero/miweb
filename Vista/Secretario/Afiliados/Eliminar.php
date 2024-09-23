<?php
    require_once("c://xampp/htdocs/proyectotls/controlador/AfiliadoControlador.php");
    $obj = new AfiliadoControlador();
    $obj->Eliminar($_GET['id']);
?>