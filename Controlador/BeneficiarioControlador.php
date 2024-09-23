<?php
    class BeneficiarioControlador{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyectotls/Modelo/BeneficiarioModelo.php");
            $this->model = new BeneficiarioModelo();
        }

        public function guardar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado){
            $id = $this->model->insertar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado);
            return ($id=false) ? header("Location: RegistrarBeneficiarios.php") : header("Location: Mostrar.php?id=".$NumeroIdentificacion);
        }
        public function Mostrar($NumeroIdentificacion){
            return ($this->model->Mostrar($NumeroIdentificacion) != false) ? $this->model->Mostrar($NumeroIdentificacion) : header("Location:index.php");
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }  
        public function Modificar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado){
            return ($this->model->Modificar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado) != false) ? header("Location: Mostrar.php?id=".$NumeroIdentificacion) : header("Location:index.php");
        }
        public function Eliminar($NumeroIdentificacion){
            return ($this->model->Eliminar($NumeroIdentificacion)) ? header("Location:index.php") : header("Location:Mostrar.php?id=".$NumeroIdentificacion);
        }
        public function getCodigo($NumeroIdentificacionAfiliado){
            return ($this->model->getCodigo($NumeroIdentificacionAfiliado)) ? $this->model->getCodigo($NumeroIdentificacionAfiliado) : false;
        }
    }
?>