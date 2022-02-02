<?php
    class Query extends Conexion{
        private $mysqli, $con, $sql, $datos;
        public function __construct()
        {
            $this->mysqli = new Conexion();
            $this->con = $this->mysqli->conect();
        }
        public function select(string $sql){
            $this->sql = $sql;
            $stmt = $this->con->prepare($this->sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            return $data;
        }
        public function selectAll(string $sql){
            $this->sql = $sql;
            $stmt = $this->con->prepare($this->sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
        public function save(string $sql, array $datos){
            $this->sql = $sql;
            $this->datos = $datos;
            $insert = $this->con->prepare($this->sql);
            $data = $insert->execute($this->datos);
            if($data){
                $res = 1;
            }else{
                $res = 0;
            }
            return $res;
        }
    }
?>