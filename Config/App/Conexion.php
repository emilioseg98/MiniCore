<?php
    class Conexion{
        private $conect;
        public function __construct()
        {
            $jawsdb_url = parse_url(getenv("JAWSDB_URL"));
            $jawsdb_server = "uzb4o9e2oe257glt.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
            $jawsdb_username = "a1do883xd3tsbkvg";
            $jawsdb_password = "xtjw27xiu6vlq6fz";
            $jawsdb_db = "bnbmjxzfv75clk5v";
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