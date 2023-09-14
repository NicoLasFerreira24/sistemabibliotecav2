<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/Aluno.php";

    class AlunoController{

        private $alunoModel;

        public function __construct()
        {
        $this->alunoModel = New Alunos();
        }
        public function listarAlunos(){

        return $this->alunoModel->Listar();
        }

        public function cadastrarAluno(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $dados = [
                    'nome' => $_POST['nome'],
                    'cpf' => $_POST['cpf'],
                    'email' => $_POST['email'],
                    'telefone' => $_POST['telefone'],
                    'celular' => $_POST['celular'],
                    'data_nascimento' => $_POST['data_nascimento']
                ];

                $this->alunoModel->Cadastrar($dados);

                header('Location: index.php');
                exit;
            }
        }    
    }