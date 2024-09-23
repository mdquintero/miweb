<?php
    class juzgadomodelo{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/proyectotls/config/BaseDatos.php");
            $con = new BaseDatos();
            $this->PDO = $con->conexion();
        }
        public function insertar($Codigo, $Ciudad, $Despacho, $Juez){
            try{
                $statement = $this->PDO->prepare("INSERT INTO tbljuzgados VALUES(:Codigo,:Ciudad,:Despacho,:Juez)");
                $statement->bindParam(":Codigo", $Codigo);
                $statement->bindParam(":Ciudad", $Ciudad);
                $statement->bindParam(":Despacho", $Despacho);
                $statement->bindParam(":Juez", $Juez);
                return ($statement->execute()) ? $this->PDO->lastInsertId() :false ;
            }catch (PDOException $e) {
            
                if ($e->getCode() == 23000) {
                    
                    header("Location: ../Juzgado/crear.php?error=2");
                    exit();
                } else {
                    
                    throw $e;
                }
            }
    
        }
        public function show($Codigo){
            $statement =$this->PDO->prepare(" SELECT * FROM tbljuzgados where Codigo = :Codigo limit 1");
            $statement->bindParam(":Codigo",$Codigo);
            return ($statement->execute()) ? $statement->fetch() : false;
        }
        public function Index(){
            $stament = $this->PDO->prepare("SELECT * FROM tbljuzgados");
            return ($stament->execute()) ? $stament->fetchAll() : false;
        }
        public function update($Codigo, $Ciudad, $Despacho, $Juez){
            $stament = $this->PDO->prepare("UPDATE tbljuzgados SET Ciudad = :Ciudad, Despacho = :Despacho, Juez = :Juez WHERE Codigo = :Codigo");
            $stament ->bindParam(":Ciudad",$Ciudad);
            $stament ->bindParam(":Despacho",$Despacho);
            $stament ->bindParam(":Juez",$Juez);
            $stament ->bindParam(":Codigo",$Codigo);
            return ($stament->execute()) ? $Codigo : false;
        }
    }

?>