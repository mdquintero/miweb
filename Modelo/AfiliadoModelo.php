<?php
class AfiliadoModelo{

    private $PDO;

    public function __construct()
    {
        require_once("c://xampp/htdocs/proyectotls/config/BaseDatos.php");
        $con = new BaseDatos ();
        $this->PDO = $con->conexion();
    }

    public function insertar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario){
        try{
            $statement = $this->PDO->prepare("INSERT INTO tblafiliados (NumeroIdentificacion, TipoIdentificacion, TipoContrato, FechaAfiliacion, Empresa, Nombres, Apellidos, CedulaUsuario) 
            VALUES (:NumeroIdentificacion, :TipoIdentificacion, :TipoContrato, :FechaAfiliacion, :Empresa, :Nombres, :Apellidos, :CedulaUsuario)");
        
            $statement->bindParam(":NumeroIdentificacion", $NumeroIdentificacion);
            $statement->bindParam(":TipoIdentificacion", $TipoIdentificacion);
            $statement->bindParam(":TipoContrato", $TipoContrato);
            $statement->bindParam(":FechaAfiliacion", $FechaAfiliacion);
            $statement->bindParam(":Empresa", $Empresa);
            $statement->bindParam(":Nombres", $Nombres);
            $statement->bindParam(":Apellidos", $Apellidos);
            $statement->bindParam(":CedulaUsuario", $CedulaUsuario);
        
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }catch (PDOException $e) {
            
            if ($e->getCode() == 23000) {
                
                header("Location: ../Afiliados/RegistrarAfiliados.php?error=2");
                exit();
            } else {
                
                throw $e;
            }
        }

    }
    public function Mostrar($NumeroIdentificacion){
        $statement = $this->PDO->prepare("SELECT * FROM tblafiliados WHERE NumeroIdentificacion = :NumeroIdentificacion limit 1 ");
        $statement->bindParam(":NumeroIdentificacion",$NumeroIdentificacion);
        return ($statement->execute()) ? $statement->fetch() : false ;
    }
    public function index(){
        $statement = $this->PDO->prepare("SELECT * FROM tblafiliados");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    public function Modificar($NumeroIdentificacion, $TipoIdentificacion, $TipoContrato, $FechaAfiliacion, $Empresa, $Nombres, $Apellidos, $CedulaUsuario){
        $statement = $this->PDO->prepare("UPDATE tblafiliados SET NumeroIdentificacion = :NumeroIdentificacion, TipoIdentificacion = :TipoIdentificacion, TipoContrato = :TipoContrato, FechaAfiliacion = :FechaAfiliacion, Empresa = :Empresa, Nombres = :Nombres, Apellidos = :Apellidos,  CedulaUsuario = :CedulaUsuario WHERE NumeroIdentificacion = :NumeroIdentificacion");
    
        $statement->bindParam(":NumeroIdentificacion", $NumeroIdentificacion);
        $statement->bindParam(":TipoIdentificacion", $TipoIdentificacion);
        $statement->bindParam(":TipoContrato", $TipoContrato);
        $statement->bindParam(":FechaAfiliacion", $FechaAfiliacion);
        $statement->bindParam(":Empresa", $Empresa);
        $statement->bindParam(":Nombres", $Nombres);
        $statement->bindParam(":Apellidos", $Apellidos);
        $statement->bindParam(":CedulaUsuario", $CedulaUsuario);
        
        return ($statement->execute()) ? $NumeroIdentificacion : false;
    }
    public function Eliminar($NumeroIdentificacion){
        $statement = $this->PDO->prepare("DELETE FROM tblafiliados WHERE NumeroIdentificacion = :NumeroIdentificacion");
        $statement->bindParam(":NumeroIdentificacion",$NumeroIdentificacion);
        return ($statement->execute()) ? true : false;
    }

     // Método para verificar si el afiliado ya esta vinculado con el proceso y evitar la duplicación de registros
     public function VerificarVinculo($CodigoProceso, $NumeroAfiliado){
        $statement = $this->PDO->prepare("SELECT COUNT(*) as total FROM tblrelacionaprocesos 
        WHERE CodigoProceso = :CodigoProceso 
        AND NumeroAfiliado = :NumeroAfiliado ");
        $statement->bindParam(":CodigoProceso", $CodigoProceso);
        $statement->bindParam(":NumeroAfiliado", $NumeroAfiliado);
        $statement->execute();
        $Resultado = $statement->fetch(PDO::FETCH_ASSOC);
        return $Resultado['total'] > 0 ;
    }
    // Método para vincular al afiliado con su proceso jurídico
    public function VincularProceso($CodigoProceso, $NumeroAfiliado){
        $statement = $this->PDO->prepare("INSERT INTO tblrelacionaprocesos(CodigoProceso, NumeroAfiliado) 
        VALUES(:CodigoProceso, :NumeroAfiliado)");
        $statement->bindParam(":CodigoProceso", $CodigoProceso);
        $statement->bindParam(":NumeroAfiliado", $NumeroAfiliado);
        return ($statement->execute()) ? true : false;
    }
    // Muestra los procesos relacionados con el afiliado
    public function MostrarProcesos($NumeroAfiliado){
        $statement = $this->PDO->prepare("SELECT 
            a.NumeroIdentificacion, 
            a.TipoIdentificacion, 
            a.TipoContrato, 
            a.FechaAfiliacion, 
            a.Empresa, 
            a.Nombres, 
            a.Apellidos, 
            pj.Codigo, 
            pj.FechaInicio,
            pj.FechaFin,
            pj.Descripcion, 
            pj.Juzgado 
        FROM 
            tblAfiliados a 
        JOIN 
            tblrelacionaprocesos rp 
            ON a.NumeroIdentificacion = rp.NumeroAfiliado 
        JOIN 
            tblprocesosjuridicos pj 
            ON rp.CodigoProceso = pj.Codigo
        WHERE 
            a.NumeroIdentificacion = :NumeroAfiliado
        ");
        $statement->bindParam(":NumeroAfiliado", $NumeroAfiliado);
         return ($statement->execute()) ? $statement->fetchAll() : false;

    }
}    

?>