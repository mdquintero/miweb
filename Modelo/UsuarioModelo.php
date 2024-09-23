<?php
require_once("c://xampp/htdocs/proyectotls/Config/BaseDatos.php");

class UsuarioModelo {
    private $PDO;

    public function __construct() {
        $con = new BaseDatos();
        $this->PDO = $con->conexion();
    }
    public function insertar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula, $Borrador = 1)  {
        try{
            // Encriptación de la contraseña
            $ContraseñaEncriptada = password_hash($Contraseña, PASSWORD_DEFAULT);

            // Preparar la consulta SQL con parámetros
            $statement = $this->PDO->prepare("INSERT INTO tblusuarios 
                (Codigo, Correo, Usuario, Contraseña, Rol, Nombres, Apellidos, FechaNacimiento, Direccion, Telefono, Cargo, NumeroTargetaProfesional, Cedula, Borrador) 
                VALUES 
                (:CodigoUsuario, :Correo, :Usuario, :Contrasena, :Rol, :Nombres, :Apellidos, :FechaNacimiento, :Direccion, :Telefono, :Cargo, :NumeroTarjetaProfesional, :Cedula, :Borrador)");

            // Vincular parámetros a la consulta
            $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
            $statement->bindParam(":Correo", $Correo);
            $statement->bindParam(":Usuario", $Usuario);
            $statement->bindParam(":Contrasena", $ContraseñaEncriptada); // Uso de "Contraseña" sin la ñ
            $statement->bindParam(":Rol", $Rol);
            $statement->bindParam(":Nombres", $Nombres);
            $statement->bindParam(":Apellidos", $Apellidos);
            $statement->bindParam(":FechaNacimiento", $FechaNacimiento);
            $statement->bindParam(":Direccion", $Direccion);
            $statement->bindParam(":Telefono", $Telefono);
            $statement->bindParam(":Cargo", $Cargo);
            $statement->bindParam(":NumeroTarjetaProfesional", $NumeroTarjetaProfesional);
            $statement->bindParam(":Cedula", $Cedula);
            $statement->bindParam(":Borrador", $Borrador);

            // Ejecutar la consulta y retornar el resultado
            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }catch (PDOException $e) {
            
            if ($e->getCode() == 23000) {
                
                header("Location: ../Usuarios/CrearUsuario.php?error=2");
                exit();
            } else {
                
                throw $e;
            }
        }

    }

    public function mostrar($CodigoUsuario) {
        $statement = $this->PDO->prepare("SELECT * FROM tblroles r JOIN tblusuarios u ON r.Codigo = u.Rol WHERE u.Codigo = :CodigoUsuario LIMIT 1");
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function indexCoordinador() {
        $statement = $this->PDO->prepare("SELECT r.Nombre, r.Codigo AS RolCodigo, u.Codigo, u.Correo, u.Usuario, u.Contraseña, u.Rol, u.Nombres, u.Apellidos 
            FROM tblroles r 
            JOIN tblusuarios u ON r.Codigo = u.Rol 
            WHERE u.Rol = '3'");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function modificar($CodigoUsuario, $Correo, $Usuario, $Contraseña, $Rol, $Nombres, $Apellidos, $FechaNacimiento, $Direccion, $Telefono, $Cargo, $NumeroTarjetaProfesional, $Cedula) {
        // Asegurar el hash de la nueva contraseña
        $ContraseñaHashed = password_hash($Contraseña, PASSWORD_BCRYPT);

        $statement = $this->PDO->prepare("UPDATE tblusuarios 
            SET Correo = :Correo, Usuario = :Usuario, Contraseña = :Contrasena, Rol = :Rol, Nombres = :Nombres, Apellidos = :Apellidos, FechaNacimiento = :FechaNacimiento, Direccion = :Direccion, Telefono = :Telefono, Cargo = :Cargo, NumeroTargetaProfesional = :NumeroTarjetaProfesional, Cedula = :Cedula 
            WHERE Codigo = :CodigoUsuario");

        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        $statement->bindParam(":Correo", $Correo);
        $statement->bindParam(":Usuario", $Usuario);
        $statement->bindParam(":Contrasena", $Contraseña); // Uso de "Contraseña" sin la ñ
        $statement->bindParam(":Rol", $Rol);
        $statement->bindParam(":Nombres", $Nombres);
        $statement->bindParam(":Apellidos", $Apellidos);
        $statement->bindParam(":FechaNacimiento", $FechaNacimiento);
        $statement->bindParam(":Direccion", $Direccion);
        $statement->bindParam(":Telefono", $Telefono);
        $statement->bindParam(":Cargo", $Cargo);
        $statement->bindParam(":NumeroTarjetaProfesional", $NumeroTarjetaProfesional);
        $statement->bindParam(":Cedula", $Cedula);

        return ($statement->execute()) ? $CodigoUsuario : false;
    }

    public function historialJuridico($CodigoUsuario) {
        $statement = $this->PDO->prepare("SELECT pj.Codigo, pj.FechaInicio, pj.FechaFin, pj.Descripcion, pj.Juzgado, gp.CodigoProcesoGestinado, gp.CodigoUsuarioGestionado, u.Codigo, u.Usuario, u.Nombres, u.Apellidos, u.Correo 
            FROM tblprocesosjuridicos pj 
            JOIN tblgestionaprocesos gp ON pj.Codigo = gp.CodigoProcesoGestinado 
            JOIN tblusuarios u ON gp.CodigoUsuarioGestionado = u.Codigo 
            WHERE u.Codigo = :CodigoUsuario");
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function verificarAsignacion($CodigoProceso, $CodigoUsuario) {
        $statement = $this->PDO->prepare("SELECT COUNT(*) as total 
            FROM tblgestionaprocesos 
            WHERE CodigoProcesoGestinado = :CodigoProceso 
            AND CodigoUsuarioGestionado = :CodigoUsuario");
        $statement->bindParam(":CodigoProceso", $CodigoProceso);
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        $statement->execute();
        $Resultado = $statement->fetch(PDO::FETCH_ASSOC);
        return $Resultado['total'] > 0;
    }

    public function asignarProceso($CodigoProceso, $CodigoUsuario) {
        $statement = $this->PDO->prepare("INSERT INTO tblgestionaprocesos (CodigoProcesoGestinado, CodigoUsuarioGestionado) 
            VALUES (:CodigoProceso, :CodigoUsuario)");
        $statement->bindParam(":CodigoProceso", $CodigoProceso);
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        return ($statement->execute()) ? true : false;
    }

    public function reasignarProceso($CodigoProceso, $CodigoUsuario) {
        $statement = $this->PDO->prepare("UPDATE tblgestionaprocesos 
            SET CodigoUsuarioGestionado = :CodigoUsuario 
            WHERE CodigoProcesoGestinado = :CodigoProceso");
        $statement->bindParam(":CodigoProceso", $CodigoProceso);
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        return ($statement->execute()) ? $CodigoUsuario : false;
    }

    public function eliminar($CodigoUsuario) {
        $statement = $this->PDO->prepare("UPDATE tblusuarios SET Borrador = 0 WHERE Codigo = :CodigoUsuario");
        $statement->bindParam(":CodigoUsuario", $CodigoUsuario);
        return ($statement->execute()) ? true : false;
    }
    
    public function index() {
        $statement = $this->PDO->prepare("SELECT r.Nombre, r.Codigo AS RolCodigo, u.Codigo, u.Correo, u.Usuario, u.Contraseña, u.Rol, u.Nombres, u.Apellidos 
            FROM tblroles r 
            JOIN tblusuarios u ON r.Codigo = u.Rol 
            WHERE u.Borrador = 1");
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}
?>
