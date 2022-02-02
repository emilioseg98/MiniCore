<?php
    class Conexion{
        private $conect;
        public function __construct()
        {
            $jawsdb_url = parse_url(getenv("JAWSDB_URL"));
            $jawsdb_server = $jawsdb_url["host"];
            $jawsdb_username = $jawsdb_url["user"];
            $jawsdb_password = $jawsdb_url["pass"];
            $jawsdb_db = substr($jawsdb_url["path"],1);
            $active_group = 'default';
            $query_builder = TRUE;
            try{
                $this->conect = new mysqli($jawsdb_server, $jawsdb_username, $jawsdb_password, $jawsdb_db);
            }catch(mysqli_sql_exception $e){
                echo "Error en la conexión ".$e->getMessage();
            }
        }
        public function conect(){
            return $this->conect;
        }
    }
?>