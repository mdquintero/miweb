<?php
class ContraseñaModelo {
    private $PDO;

    public function __construct() {
        require_once("c://xampp/htdocs/proyectotls/config/BaseDatos.php");
        $con = new BaseDatos();
        $this->PDO = $con->conexion();
    }

    public function cambiarContraseña($correo, $nuevaContraseña) {
        $statement = $this->PDO->prepare("UPDATE tblusuarios SET Contraseña = :nuevacontrasena WHERE Correo = :correo");
        
        // Asegurar que los nombres de los parámetros coincidan con los de la consulta preparada
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":nuevacontrasena", $nuevaContraseña);

        return $statement->execute();
    }

    public function verificarCorreo($correo) {
        $sql = "SELECT COUNT(*) FROM tblusuarios WHERE Correo = :correo";
        $statement = $this->PDO->prepare($sql);
        
        // Asegurar que los nombres de los parámetros coincidan con los de la consulta preparada
        $statement->bindParam(':correo', $correo);

        $statement->execute();
        return $statement->fetchColumn() > 0;
    }
}
?>
