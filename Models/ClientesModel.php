<?php
    class ClientesModel extends Query{
        private $ci, $nombre, $telefono, $direccion, $id;
        public function __construct(){
            parent::__construct();
        }
        public function getClientess(){
            $sql = "SELECT * FROM clientes";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarCliente(string $ci, string $nombre, string $telefono, string $direccion){
            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $verificar = "SELECT * FROM clientes WHERE ci = '$this->ci'";
            $existe = $this->select($verificar);
            if(empty($existe)){
                $sql = "INSERT INTO clientes(ci, nombre, telefono, direccion) VALUES (?,?,?,?)";
                $datos = array($this->ci, $this->nombre, $this->telefono, $this->direccion);
                $data = $this->save($sql, $datos);
                if($data == 1){
                    $res = "OK";
                }else{
                    $res = "error";
                }
            }else{
                $res = "existe";
            }
            return $res;
        }
        public function modificarCliente(string $ci, string $nombre, string $telefono, string $direccion, int $id){
            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->id = $id;
            $this->direccion = $direccion;
            $sql = "UPDATE clientes SET ci = ?, nombre = ?, telefono = ?, direccion = ? WHERE id = ?";
            $datos = array($this->ci, $this->nombre, $this->telefono, $this->direccion, $this->id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "modificado";
            }else{
                $res = "error";
            }
            return $res;
        }
        public function editarCli(int $id){
            $sql = "SELECT * FROM clientes WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        public function eliminarCliente(int $id){
            $this->id = $id;
            $sql = "DELETE FROM clientes WHERE id = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
    }
?>