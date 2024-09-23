<?php
    class ProcesosModelo{
        private $PDO;
        public function __construct(){
            require_once "C:\\xampp\htdocs\proyectotls\Config\BaseDatos.php";
            $con = new BaseDatos();
            $this->PDO = $con->conexion();
        }
        
        public function insertar($Radicado, $Fechain, $Fechafin, $Descripcion, $Juzgado, $Estado = 'Activo'){
            try{
                $statement = $this->PDO->prepare("INSERT INTO tblprocesosJuridicos (Codigo, FechaInicio, FechaFin, Descripcion, Juzgado, Estado) VALUES (:Radicado, :Fechain, :Fechafin, :Descripcion, :Juzgado, :Estado)");
                $statement->bindParam(":Radicado", $Radicado);
                $statement->bindParam(":Fechain", $Fechain);
                $statement->bindParam(":Fechafin", $Fechafin);
                $statement->bindParam(":Descripcion", $Descripcion);
                $statement->bindParam(":Juzgado", $Juzgado);
                $statement->bindParam(":Estado", $Estado);
                return ($statement->execute()) ? $this->PDO->LastInsertId() : false ;
            }catch (PDOException $e) {
            
                if ($e->getCode() == 23000) {
                    
                    header("Location: ../ProcesosJuridicos/CrearProceso.php?error=2");
                    exit();
                } else {
                    
                    throw $e;
                }
            }
    
        }
        public Function Mostrar($Radicado){
            $statement = $this->PDO->prepare("SELECT * FROM tblprocesosjuridicos WHERE Codigo = :Radicado limit 1");
            $statement->bindParam(":Radicado", $Radicado);
            return ($statement->execute()) ? $statement->fetch() :false;

        }
        public function Index(){
            $statement = $this->PDO->prepare("SELECT * FROM tblprocesosjuridicos");
            return ($statement->execute()) ? $statement->fetchall() : false;
        }

        public function IndexAbogado(){
            $statement = $this->PDO->prepare("SELECT * FROM tblprocesosjuridicos WHERE Estado = 'Activo'" );
            return ($statement->execute()) ? $statement->fetchall() : false;
        }
        public function Editar($Radicado, $Fechain, $Fechafin,  $Descripcion, $Juzgado){
            $statement = $this->PDO->prepare("UPDATE tblprocesosjuridicos  SET FechaInicio = :Fechain, FechaFin = :Fechafin, Descripcion = :Descripcion, Juzgado = :Juzgado WHERE Codigo = :Radicado");

            $statement->bindParam(":Radicado", $Radicado);
            $statement->bindParam(":Fechain", $Fechain);
            $statement->bindParam(":Fechafin", $Fechafin);
            $statement->bindParam(":Descripcion", $Descripcion);
            $statement->bindParam(":Juzgado", $Juzgado);
            return ($statement->execute()) ? $Radicado : false ;
        }

        public function EditarEstado($Radicado,$Estado){
            $statement = $this->PDO->prepare("UPDATE tblprocesosjuridicos  SET Estado = :Estado WHERE Codigo = :Radicado");

            $statement->bindParam(":Radicado", $Radicado);
            $statement->bindParam(":Estado", $Estado);
            return ($statement->execute()) ? true : false ;
        }
        
        // Método para obtener un proceso por Codigo
    public function getProcesoById($id) {
        $statement = $this->PDO->prepare("SELECT * FROM tblprocesosjuridicos WHERE Codigo = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar la descripción de un proceso
    public function updateDescripcion($id, $descripcion) {
        $statement = $this->PDO->prepare("UPDATE tblprocesosjuridicos SET Descripcion = :descripcion WHERE Codigo = :id");
        $statement->bindParam(":id", $id);
        $statement->bindParam(":descripcion", $descripcion);
        return $statement->execute();
    }
    public function ProcesosAsignados(){
    $statement=$this->PDO->prepare("SELECT u.Codigo, u.Correo, u.Usuario, u.Nombres, u.Apellidos, u.FechaNacimiento, u.Direccion, u.Telefono, u.Cargo, NumeroTargetaProfesional, u.Cedula, pj.Codigo ,pj.FechaInicio, pj.FechaFin, pj.Descripcion, pj.Juzgado FROM  tblusuarios u JOIN tblgestionaprocesos gp ON u.Codigo = gp.CodigoUsuarioGestionado JOIN tblprocesosjuridicos pj ON gp.CodigoProcesoGestinado = pj.Codigo WHERE 
    CodigoUsuarioGestionado = ");
    $Codigo = $_SESSION['Codigo']; 
    $statement->bindParam(":Codigo", $Codigo);
    return $statement->execute();
    
    }
    
        /**Funcición Nueva Asesor  Mostrar*/
        public Function MostrarAsesor($Radicado){
            $statement = $this->PDO->prepare("SELECT u.Codigo, u.Correo, u.Usuario, u.Contraseña, u.Rol, u.Nombres, u.Apellidos, u.Direccion, u.Telefono, u.Cargo, u.NumeroTargetaProfesional, u.Cedula, g.CodigoProcesoGestinado, g.CodigoUsuarioGestionado, p.Descripcion, p.Juzgado
            FROM tblusuarios u
            JOIN tblgestionaprocesos g ON u.Codigo = g.CodigoUsuarioGestionado
            JOIN tblprocesosjuridicos p ON g.CodigoProcesoGestinado = p.Codigo
            WHERE p.Codigo = :Radicado
            LIMIT 1");
            $statement->bindParam(":Radicado", $Radicado);
            return ($statement->execute()) ? $statement->fetch() :false;

        }
        /**Funcición Nueva Asesor Index*/
        public function IndexAsesor(){
            $statement = $this->PDO->prepare("SELECT u.Codigo, u.Correo, u.Nombres, u.Apellidos, u.Telefono, u.Cargo, u.NumeroTargetaProfesional, u.Cedula, g.CodigoProcesoGestinado, g.CodigoUsuarioGestionado, p.Descripcion, p.Juzgado, p.Codigo, p.FechaInicio, p.FechaFin, p.Estado
            FROM tblusuarios u
            JOIN tblgestionaprocesos g ON u.Codigo = g.CodigoUsuarioGestionado
            JOIN tblprocesosjuridicos p ON g.CodigoProcesoGestinado = p.Codigo
            WHERE p.Estado = 'Activo' ");
            return ($statement->execute()) ? $statement->fetchall() : false;
        }
}
?>
