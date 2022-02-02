<?php
    class Clientes extends Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $this->views->getViews($this, "index");
        }
        public function listar(){
            $data = $this->model->getClientess();
            for ($i=0; $i < count($data); $i++) { 
                $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" onclick="btnEditarCli('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" onclick="btnEliminarCli('.$data[$i]['id'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar()
        {
            $ci = $_POST['ci'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $id = $_POST['id'];
            if(empty($ci) || empty($nombre) || empty($telefono) || empty($direccion)){
                $msg = "Todos los campos son obligatorios";
            }else{
                if($id == ""){
                    $data = $this->model->registrarCliente($ci, $nombre, $telefono, $direccion);
                    if($data == "OK"){
                        $msg = array('msg' => 'Cliente Registrado con éxito', 'icono' => 'success');
                    }else if($data == "existe"){
                        $msg = array('msg' => 'El Cliente ya existe', 'icono' => 'warning');
                    }else{
                        $msg = array('msg' => 'Error al registrar el cliente', 'icono' => 'error');
                    }
                }else{
                    $data = $this->model->modificarCliente($ci, $nombre, $telefono, $direccion, $id);
                    if($data == "modificado"){
                        $msg = array('msg' => 'Cliente Modificado con éxito', 'icono' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al modificar el Cliente', 'icono' => 'error');
                    }
                }
                
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function editar(int $id){
            $data = $this->model->editarCli($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->eliminarCliente($id);
            if($data == 1){
                $msg = array('msg' => 'Cliente Eliminado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al eliminar el cliente', 'icono' => 'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>