<?php
class BeneficiarioModelo{

    private $PDO;

    public function __construct()
    {
        require_once("c://xampp/htdocs/proyectotls/config/BaseDatos.php");
        $con = new BaseDatos ();
        $this->PDO = $con->conexion();
    }

    public function insertar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado){
        try{
            $statement = $this->PDO->prepare("INSERT INTO tblbeneficiarios (NumeroIdentificacion, Nombres, Apellidos, TipoIdentificacion, Parentesco, NumIdentificacionAfiliado) 
            VALUES (:NumeroIdentificacion, :Nombres, :Apellidos, :TipoIdentificacion, :Parentesco, :NumIdentificacionAfiliado)");
        
            $statement->bindParam(":NumeroIdentificacion", $NumeroIdentificacion);
            $statement->bindParam(":Nombres", $Nombres);
            $statement->bindParam(":Apellidos", $Apellidos);
            $statement->bindParam(":TipoIdentificacion", $TipoIdentificacion);
            $statement->bindParam(":Parentesco", $Parentesco);
            $statement->bindParam(":NumIdentificacionAfiliado", $NumIdentificacionAfiliado);
        
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }catch (PDOException $e) {
            
            if ($e->getCode() == 23000) {
                
                header("Location: ../Beneficiarios/RegistrarBeneficiarios.php?error=2");
                exit();
            } else {
                
                throw $e;
            }
        }

    }
    public function Mostrar($NumeroIdentificacion){
        $statement = $this->PDO->prepare("SELECT * FROM tblbeneficiarios WHERE NumeroIdentificacion = :NumeroIdentificacion limit 1 ");
        $statement->bindParam(":NumeroIdentificacion",$NumeroIdentificacion);
        return ($statement->execute()) ? $statement->fetch() : false ;
    }
    public function index(){
        $statement = $this->PDO->prepare("SELECT * FROM tblbeneficiarios");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function Modificar($NumeroIdentificacion, $Nombres, $Apellidos, $TipoIdentificacion, $Parentesco, $NumIdentificacionAfiliado){
        $statement = $this->PDO->prepare("UPDATE tblbeneficiarios SET NumeroIdentificacion = :NumeroIdentificacion, Nombres = :Nombres, Apellidos = :Apellidos, TipoIdentificacion = :TipoIdentificacion, Parentesco = :Parentesco, NumIdentificacionAfiliado = :NumIdentificacionAfiliado WHERE NumeroIdentificacion = :NumeroIdentificacion");
    
        $statement->bindParam(":NumeroIdentificacion", $NumeroIdentificacion);
        $statement->bindParam(":Nombres", $Nombres);
        $statement->bindParam(":Apellidos", $Apellidos);
        $statement->bindParam(":TipoIdentificacion", $TipoIdentificacion);
        $statement->bindParam(":Parentesco", $Parentesco);
        $statement->bindParam(":NumIdentificacionAfiliado", $NumIdentificacionAfiliado);
        
        return ($statement->execute()) ? $NumeroIdentificacion : false;
    }
    public function Eliminar($NumeroIdentificacion){
        $statement = $this->PDO->prepare("DELETE FROM tblbeneficiarios WHERE NumeroIdentificacion = :NumeroIdentificacion");
        $statement->bindParam(":NumeroIdentificacion",$NumeroIdentificacion);
        return ($statement->execute()) ? true : false;
    }
     /*Nueva Función para obtener beneficiario "Asesor"*/
     public function getCodigo($NumeroIdentificacionAfiliado){
        $statement = $this->PDO->prepare("SELECT NumeroIdentificacion FROM tblbeneficiarios WHERE NumIdentificacionAfiliado = :NumeroIdentificacionAfiliado");
        $statement->bindParam(":NumeroIdentificacionAfiliado", $NumeroIdentificacionAfiliado);
        $statement->execute();
        $Beneficiario = $statement->fetch(PDO::FETCH_ASSOC);
        return (isset($Beneficiario['NumeroIdentificacion'])) ? $Beneficiario['NumeroIdentificacion'] : false;
    }
}    

?>