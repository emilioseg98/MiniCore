<?php
    class Libros extends Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $this->views->getViews($this, "index");
        }
        public function listar(){
            $data = $this->model->getLibros();
            for ($i=0; $i < count($data); $i++) { 
                $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" onclick="btnEditarLib('.$data[$i]['id'].')"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" onclick="btnEliminarLib('.$data[$i]['id'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar()
        {
            $nombre = $_POST['nombre'];
            $autor = $_POST['autor'];
            $editorial = $_POST['editorial'];
            $id = $_POST['id'];
            if(empty($nombre) || empty($autor) || empty($editorial)){
                $msg = "Todos los campos son obligatorios";
            }else{
                if($id == ""){
                    $data = $this->model->registrarLibro($nombre, $autor, $editorial);
                    if($data == "OK"){
                        $msg = array('msg' => 'Libro Registrado con éxito', 'icono' => 'success');
                    }else if($data == "existe"){
                        $msg = array('msg' => 'El Libro ya existe', 'icono' => 'warning');
                    }else{
                        $msg = array('msg' => 'Error al registrar el Libro', 'icono' => 'error');
                    }
                }else{
                    $data = $this->model->modificarLibro($nombre, $autor, $editorial, $id);
                    if($data == "modificado"){
                        $msg = array('msg' => 'Libro Modificado con éxito', 'icono' => 'success');
                    }else{
                        $msg = array('msg' => 'Error al modificar el Libro', 'icono' => 'error');
                    }
                }
                
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
        public function editar(int $id){
            $data = $this->model->editarLib($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->eliminarLibro($id);
            if($data == 1){
                $msg = array('msg' => 'Libro Eliminado', 'icono' => 'success');
            }else{
                $msg = array('msg' => 'Error al eliminar el libro', 'icono' => 'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>