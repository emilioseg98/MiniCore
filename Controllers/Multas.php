<?php
    class Multas extends Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $this->views->getViews($this, "index");
        }
        public function listar(){
            echo json_encode($this->model->getMultas(), JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>