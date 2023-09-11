<?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/models/livro.php";


    class LivroController{

        private $livroModel;

        public function __construct()
        {
            $this->livroModel = new livro();
        }

        public function listarlivro(){
            return $this->livroModel->listar();

        }

    }