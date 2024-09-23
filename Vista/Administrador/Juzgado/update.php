<?php
    require_once("c://xampp/htdocs/proyectotls/Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $obj->update($_POST['Codigo'],$_POST['Ciudad'],$_POST['Despacho'],$_POST['Juez']);

?>
