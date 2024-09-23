<?php
    class AfiliadoControlador{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyectotls/Modelo/AfiliadoModelo.php");
            $this->model = new AfiliadoModelo();
        }

        public function guardar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario){
            $id = $this->model->insertar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario);
            return ($id=false) ? header("Location: registrar_Afiliados.php") : header("Location: Mostrar.php?id=".$NumeroIdentificacion);
        }
        public function Mostrar($NumeroIdentificacion){
            return ($this->model->Mostrar($NumeroIdentificacion) != false) ? $this->model->Mostrar($NumeroIdentificacion) : header("Location:index.php");
        }
        public function index(){
            return ($this->model->index()) ? $this->model->index() : false;
        }  
        public function Modificar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario){
            return ($this->model->Modificar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario) != false) ? header("Location:index.php?id=".$NumeroIdentificacion) : header("Location:index.php");
        }
        public function Eliminar($NumeroIdentificacion){
            return ($this->model->Eliminar($NumeroIdentificacion)) ? header("Location:index.php") : header("Location:Mostrar.php?id=".$NumeroIdentificacion);
        }

         //Verifica si ya existe el registro, en caso de que sea verdadero retornará a un index con un mensaje, en caso contrario, realizará la vinculación
         public function VincularProceso($CodigoProceso, $NumeroAfiliado){
            if($this->model->VerificarVinculo( $CodigoProceso, $NumeroAfiliado)){
                return header("Location: ../ProcesosJuridicos/index.php?Mensaje=YaVinculado");
            }else{
                $id = $this->model->VincularProceso($CodigoProceso, $NumeroAfiliado);
                return ($id = false) ? header("Location: index.php?Mensaje=Error") : header("Location: index.php?Mensaje=Exito");
            }
        }
        // Método para ejecutar el método 'MostrarProcesos' que solo muestra los procesos relacionados con el afiliado 
        public function MostrarProcesos($NumeroAfiliado){
            return ($this->model->MostrarProcesos($NumeroAfiliado)) ? $this->model->MostrarProcesos($NumeroAfiliado) : false;
        } 
    }
?>