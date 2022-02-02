<?php
    class MultasModel extends Query{
        public function __construct(){
            parent::__construct();
        }
        public function getMultas(){
            $sql = "SELECT c.nombre AS nombre, SUM(m.multa) AS multaTotal FROM prestamo_libros pl INNER JOIN multas m ON pl.id = m.id_prestamo_libros INNER JOIN clientes c ON pl.id_cliente = c.id GROUP BY pl.id_cliente";
            $data = $this->selectAll($sql);
            return $data;
        }
    }
?>