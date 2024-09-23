<?php
    require_once ("../../../Controlador/UsuarioControlador.php");
    $Obj = new UsuarioControlador();
    $Obj->Eliminar($_GET['id']);
?>