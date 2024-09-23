<?php
class BaseDatos{
    private $dbhost = "localhost";
    private $dbname = "tls";
    private $dbuser = "root";
    private $dbpass = "";

    public function conexion(){
        try {
            $PDO = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpass);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch (PDOException $e) {
            return "Error de conexión: " . $e->getMessage();
            
        }
    }
}
