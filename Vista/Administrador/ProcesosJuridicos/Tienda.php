<?php
    require_once("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
    $obj = new ProcesosJuridicosControlador();

    $Radicado = $_POST['Radicado'];
    $Fechain = $_POST['Fechain'];
    $Fechafin = $_POST['Fechafin'];
    $Descripcion = $_POST['Descripcion'];
    $Juzgado = $_POST['Juzgado'];

    $obj->guardar($Radicado, $Fechain, $Fechafin, $Descripcion,$Juzgado);
    
?>