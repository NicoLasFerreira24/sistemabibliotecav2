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
}