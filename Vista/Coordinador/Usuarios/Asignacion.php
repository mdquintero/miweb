<?php
    require_once ("../../../Controlador/UsuarioControlador.php");
    $Obj = new UsuarioControlador();
    $CodigoProceso = $_GET['CodigoProceso'];
    $CodigoUsuario = $_GET['CodigoUsuario'];
    $Obj->AsignarProceso($CodigoProceso, $CodigoUsuario );