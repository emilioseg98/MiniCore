<?php
    class LibrosModel extends Query{
        private $nombre, $autor, $editorial, $id;
        public function __construct(){
            parent::__construct();
        }
        public function getLibros(){
            $sql = "SELECT * FROM libros";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarLibro(string $nombre, string $autor, string $editorial){
            $this->nombre = $nombre;
            $this->autor = $autor;
            $this->editorial = $editorial;
            $verificar = "SELECT * FROM libros WHERE nombre = '$this->nombre'";
            $existe = $this->select($verificar);
            if(empty($existe)){
                $sql = "INSERT INTO libros(nombre, autor, editorial) VALUES (?,?,?)";
                $datos = array( $this->nombre, $this->autor, $this->editorial);
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
        public function modificarLibro(string $nombre, string $autor, string $editorial, int $id){
            $this->nombre = $nombre;
            $this->autor = $autor;
            $this->id = $id;
            $this->editorial = $editorial;
            $sql = "UPDATE libros SET nombre = ?, autor = ?, editorial = ? WHERE id = ?";
            $datos = array($this->nombre, $this->autor, $this->editorial, $this->id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "modificado";
            }else{
                $res = "error";
            }
            return $res;
        }
        public function editarLib(int $id){
            $sql = "SELECT * FROM libros WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        public function eliminarLibro(int $id){
            $this->id = $id;
            $sql = "DELETE FROM libros WHERE id = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
    }
?>