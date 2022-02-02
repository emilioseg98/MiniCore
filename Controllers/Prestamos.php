<?php
    class Prestamos extends Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $data['clientes'] = $this->model->getClientes();
            $data['libros'] = $this->model->getLibros();
            $this->views->getViews($this, "index", $data);
        }
        public function listar(){
            $data = $this->model->getPrestamos();
            for ($i=0; $i < count($data); $i++) {
                if($data[$i]['fechaEntrega'] == null){
                    $data[$i]['fechaEntrega'] = "N/A";
                }
                if($data[$i]['estado'] == 0){
                    $data[$i]['estado'] = '<span class="badge bg-danger">No entregado</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" onclick="btnEditarPr('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-warning" onclick="btnEntregarLibro('.$data[$i]['id'].')"><i class="fas fa-book"></i></button>
                    </div>';
                    if($data[$i]['fechaFin'] <= date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). '- 1 days'))){
                        $data[$i]['verificacion'] = '<span class="badge bg-danger">Se paso del límite</span>';
                        $num = $this->calcularTiempo($data[$i]['fechaFin'], date('Y-m-d'));
                        $data[$i]['calculoMulta'] = $num[11]*5;
                    }else{
                        $data[$i]['verificacion'] = '<span class="badge bg-success">Aún tiene tiempo de entregar</span>';
                        $data[$i]['calculoMulta'] = 0;
                    }
                }else{
                    $data[$i]['estado'] = '<span class="badge bg-success">Entregado</span>';
                    $data[$i]['verificacion'] = '<span class="badge bg-success">Entregado</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-danger" onclick="btnEliminarPr('.$data[$i]['id'].')"><i class="fas fa-trash-alt"></i></button>
                    </div>';
                    $data[$i]['calculoMulta'] = 0;
                }
                if($this->model->consultarMulta($data[$i]['id'])['cont'] == 0){
                    $this->model->registrarMulta($data[$i]['id'], $data[$i]['calculoMulta']);
                }else{
                    $this->model->modificarMulta($data[$i]['id'], $data[$i]['calculoMulta']);
                }
                if($this->model->consultarPrestamo($data[$i]['id'])['cont'] != 0){
                    if($this->model->consultarEstado($data[$i]['id'])['cont'] == 1){
                        $this->model->eliminarMulta($data[$i]['id']);
                    }
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar()
        {
            $codigo = $_POST['codigo'];
            $cliente = $_POST['cliente'];
            $libro = $_POST['libro'];
            $desde = $_POST['desde'];
            $hasta = $_POST['hasta'];
            $id = $_POST['id'];
            if(empty($codigo) || empty($cliente) || empty($libro) || empty($desde) || empty($hasta)){
                $msg = "Todos los campos son obligatorios";
            }else{
                if($id == ""){
                    $data = $this->model->registrarPrestamo($codigo, $cliente, $libro, $desde, $hasta);
                    if($data == "OK"){
                        $msg = array('msg' => 'Prestamo Registrado con éxito', 'icono' => 'success');
                    }else if($data == "existe"){
                        $msg = array('msg' => 'El Código ya existe', 'icono' => 'warning');
                    }else{
                        $msg = array('msg' => 'Error al registrar el Prestamo', 'icono' => 'error');
                    }
                }else{
                    $data = $this->model->modificarPrestamo($codigo, $cliente, $libro, $desde, $hasta, $id);
                    if($data == "modificado"){
                        $msg = array('msg' => 'Prestamo Modificado con éxito', 'icono' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al modificar el Prestamo', 'icono' => 'error');
                    }
                }
                
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function editar(int $id){
            $data = $this->model->editarPr($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->eliminarPrestamo($id);
            if($data == 1){
                $msg = array('msg' => 'Prestamo Eliminado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al eliminar el prestamo', 'icono' => 'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function entregaLibro(int $idCliente){
            $entrega = $_POST['entrega'];
            $data = $this->model->entregar($entrega, $idCliente);
            if($data == "entregado"){
                $msg = array('msg' => 'El cliente ha entregado el libro', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al hacer la entrega', 'icono' => 'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function calcularTiempo($fechaFin, $fechaEntrega){
            $datetime1 = date_create($fechaFin);
            $datetime2 = date_create($fechaEntrega);
            $interval = date_diff($datetime1, $datetime2);

            $tiempo = array();

            foreach($interval as $valor){
                $tiempo[] = $valor;
            }

            return $tiempo;
        }
    }
?>