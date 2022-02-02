<?php
    class Conexion{
        private $conect;
        public function __construct()
        {
            try{
                $this->conect = new mysqli(host, user, pass, db);
            }catch(mysqli_sql_exception $e){
                echo "Error en la conexión ".$e->getMessage();
            }
        }
        public function conect(){
            return $this->conect;
        }
    }
?>