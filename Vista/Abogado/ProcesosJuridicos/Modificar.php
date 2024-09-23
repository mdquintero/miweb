<?php
    require_once ("../../../Controlador/ProcesosJuridicosControlador.php");
    $Obj = new ProcesosJuridicosControlador();
    $Obj->Editar($_POST['Codigo'], $_POST['Fechain'], $_POST['Fechafin'], $_POST['Descripcion'], $_POST['Juzgado']);


?>