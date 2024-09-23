<?php
    class juzgadocontrolador{
        private $Modelo;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyectotls/Modelo/juzgadomodelo.php");
            $this->Modelo = new juzgadomodelo();
        }
        public function guardar($codigo, $ciudad, $despacho, $juez){
            $id = $this->Modelo->insertar($codigo, $ciudad, $despacho, $juez);
            return ($id=false) ? header("Location:crear.php") : header("Location:mostrar.php?id=".$codigo);
        }
        public function show($Codigo){
            return($this->Modelo->show($Codigo) != false) ? $this->Modelo->show($Codigo) : header("Location:Index.php");
        }
        public function Index(){
            return($this->Modelo->Index()) ? $this->Modelo->Index() : false;
        }
        public function update($Codigo, $Ciudad, $Despacho, $Juez){
            return ($this->Modelo->update($Codigo, $Ciudad, $Despacho, $Juez) !=false) ? header("Location:mostrar.php?id=".$Codigo) : header("Location:Index.php");
        }
    }

?>