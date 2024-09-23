<?php
require_once ("c://xampp/htdocs/proyectotls/Controlador/juzgadocontrolador.php");
    $obj = new juzgadocontrolador();
    $codigo = $_POST['Codigo'];
    $ciudad = $_POST['Ciudad'];
    $despacho = $_POST['Despacho'];
    $juez = $_POST['Juez'];
    echo $_POST['Ciudad'];
    $obj->guardar($codigo,$ciudad,$despacho,$juez);
    
?>
