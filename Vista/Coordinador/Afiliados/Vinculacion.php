<?php
    require_once ("../../../Controlador/AfiliadoControlador.php");
    $Obj = new AfiliadoControlador();
    $CodigoProceso = $_GET['Proceso'];
    $NumeroAfiliado = $_GET['Numero'];
    $Obj->VincularProceso($CodigoProceso, $NumeroAfiliado );