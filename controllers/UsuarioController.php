<?php

require_once $_SERVER ['DOCUMENT_ROOT'] . "/models/Usuario.php";

    class UsuarioController{

        private $usuarioModel;

        public function __construct()
        {
            $this->usuarioModel = new Usuario();
        }

        public function listarUsuarios(){

            return $this-> usuarioModel->Listar();
        }


        public function cadastrarUsuario(){

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $dados = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                    'perfil' => $_POST['perfil']
                ];

                $this->usuarioModel->Cadastrar($dados);

                header('Location: index.php');
                exit;
            }
        }
        
        public function editarUsuario(){

            $id = $_GET['id'];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
                $dados = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                    'perfil' => $_POST['perfil']
                ];

                $this->usuarioModel->Editar($id, $dados);

                header('Location: index.php');
                exit;
            }

            return $this->usuarioModel->Buscar($id);

        }

    }
