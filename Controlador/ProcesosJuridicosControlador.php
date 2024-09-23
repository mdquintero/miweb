<?php
    class ProcesosJuridicosControlador{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyectotls/Modelo/ProcesosJuridicosModelo.php");   
            $this->model = new ProcesosModelo();
        }
        public function guardar($Radicado,$Fechain, $Fechafin, $Descripcion, $Juzgado){
            $id = $this->model->insertar($Radicado,$Fechain, $Fechafin, $Descripcion, $Juzgado);
            return ($id=false) ? header("Location:CrearProceso.php") : header("Location:Mostrar.php?id=".$Radicado);
        }
        public function Mostrar($Radicado){
            return ($this->model->Mostrar($Radicado)) != false ? $this->model->Mostrar($Radicado) : header("Location:index.php");
        }
        public function Index(){
            return ($this->model->Index()) ? $this->model->Index() : false;
        }

        public function IndexAbogado(){
            return ($this->model->IndexAbogado()) ? $this->model->IndexAbogado() : false;
        }
        public function Editar($Radicado,$Fechain, $Fechafin, $Descripcion, $Juzgado){
            return ($this->model->Editar($Radicado, $Fechain, $Fechafin, $Descripcion, $Juzgado) != false) ? header("Location:Mostrar.php?id=".$Radicado) : header("Location:index.php");
        }

        public function EditarEstado($Radicado,$Estado){
            return ($this->model->EditarEstado($Radicado, $Estado) != false) ? header("Location:index.php") : false;
        }
        // método para obtener un proceso por ID
    public function ObtenerProcesoPorId($id) {
        return $this->model->getProcesoById($id);
    }

    // método para actualizar la descripción
    public function ActualizarDescripcion($id, $descripcion) {
        return $this->model->updateDescripcion($id, $descripcion);
    }
    // metodo para mostrar procesos asignados 
    public function MostarProceso(){
        return $this->model->ProcesosAsignados();
    }
    
        /**Función MostrarAsesor ejecuta la función MostrarAsesor */
        public function MostrarAsesor($Radicado){
            return ($this->model->MostrarAsesor($Radicado)) != false ? $this->model->MostrarAsesor($Radicado) : header("Location:index.php");
        }
         /**Función IndexAsesor ejecuta la función IndexAsesor */
        public function IndexAsesor(){
            return ($this->model->IndexAsesor()) ? $this->model->IndexAsesor() : false;
        }
}
?>  