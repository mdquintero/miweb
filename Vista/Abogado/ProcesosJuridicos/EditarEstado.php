<?php
require_once ("c://xampp/htdocs/proyectotls/Controlador/ProcesosJuridicosControlador.php");
$Radicado = $_GET['id'];
$Estado = $_GET['Estado'];
$Obj = new ProcesosJuridicosControlador();
$Obj->EditarEstado($Radicado,$Estado);
