<?php
        require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Aluno.php";


    class AlunoController{

        private $alunoModel;

        public function __construct()
        {
            $this->alunoModel = new aluno();
        }

        public function listaraluno(){
            return $this->alunoModel->listar();

        }

    }