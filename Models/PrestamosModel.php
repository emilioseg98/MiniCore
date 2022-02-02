<?php
    class PrestamosModel extends Query{
        private $codigo, $cliente, $libro, $desde, $hasta, $id, $entrega, $idP, $multa;
        public function __construct(){
            parent::__construct();
        }
        public function getPrestamos(){
            $sql = "SELECT pl.*, c.nombre AS cliente, l.nombre AS libro FROM prestamo_libros pl INNER JOIN clientes c ON pl.id_cliente = c.id INNER JOIN libros l ON pl.id_libro = l.id";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getClientes(){
            $sql = "SELECT * FROM clientes";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function getLibros(){
            $sql = "SELECT * FROM libros";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarPrestamo(string $codigo, string $cliente, string $libro, string $desde, string $hasta){
            $this->codigo = $codigo;
            $this->cliente = $cliente;
            $this->libro = $libro;
            $this->desde = $desde;
            $this->hasta = $hasta;
            $verificar = "SELECT * FROM prestamo_libros WHERE codigo = '$this->codigo'";
            $existe = $this->select($verificar);
            if(empty($existe)){
                $sql = "INSERT INTO prestamo_libros(codigo, id_cliente, id_libro, fechaInicio, fechaFin) VALUES (?,?,?,?,?)";
                $datos = array($this->codigo, $this->cliente, $this->libro, $this->desde, $this->hasta);
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
        public function modificarPrestamo(string $codigo, string $cliente, string $libro, string $desde, string $hasta, int $id){
            $this->codigo = $codigo;
            $this->cliente = $cliente;
            $this->libro = $libro;
            $this->desde = $desde;
            $this->id = $id;
            $this->hasta = $hasta;
            $sql = "UPDATE prestamo_libros SET id_cliente = ?, id_libro = ?, fechaInicio = ?, fechaFin = ?, codigo = ? WHERE id = ?";
            $datos = array($this->cliente, $this->libro, $this->desde, $this->hasta, $this->codigo, $this->id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "modificado";
            }else{
                $res = "error";
            }
            return $res;
        }
        public function editarPr(int $id){
            $sql = "SELECT * FROM prestamo_libros WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        public function eliminarPrestamo(int $id){
            $this->id = $id;
            $sql = "DELETE FROM prestamo_libros WHERE id = ?";
            $datos = array($this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }

        public function entregar(string $entrega, int $id){
            $this->entrega = $entrega;
            $this->id = $id;
            $sql = "UPDATE prestamo_libros SET fechaEntrega = ?, estado = 1 WHERE id = ?";
            $datos = array($this->entrega, $this->id);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "entregado";
            }else{
                $res = "error";
            }
            return $res;
        }
        public function consultarMulta(int $idP){
            $sql = "SELECT COUNT(*) AS cont FROM multas WHERE id_prestamo_libros = $idP";
            $data = $this->select($sql);
            return $data;
        }
        public function consultarMultaV(int $idP){
            $sql = "SELECT multa FROM multas WHERE id_prestamo_libros = $idP";
            $data = $this->select($sql);
            return $data;
        }
        public function consultarEstado(int $idP){
            $sql = "SELECT COUNT(*) AS cont FROM multas m INNER JOIN prestamo_libros pl ON m.id_prestamo_libros = pl.id WHERE m.id_prestamo_libros = $idP AND pl.estado = 1";
            $data = $this->select($sql);
            return $data;
        }
        public function consultarPrestamo(int $idP){
            $sql = "SELECT COUNT(*) AS cont FROM prestamo_libros WHERE id = $idP";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarMulta(int $idP, string $multa){
            $this->idP = $idP;
            $this->multa = $multa;
            $sql = "INSERT INTO multas(id_prestamo_libros, multa) VALUES (?,?)";
            $datos = array($this->idP, $this->multa);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = 'ok';
            }else{
                $res = 'error';
            }
            return $res;
        }
        public function modificarMulta(int $idP, string $multa){
            $this->idP = $idP;
            $this->multa = $multa;
            $sql = "UPDATE multas SET multa = ? WHERE id_prestamo_libros = ?";
            $datos = array($this->multa, $this->idP);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = 'ok';
            }else{
                $res = 'error';
            }
            return $res;
        }
        public function eliminarMulta(int $idP){
            $this->idP = $idP;
            $sql = "DELETE FROM multas WHERE id_prestamo_libros = ?";
            $datos = array($this->idP);
            $data = $this->save($sql, $datos);
            return $data;
        }
    }
?>