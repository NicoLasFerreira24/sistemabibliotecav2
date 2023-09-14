<?php 

    require_once $_SERVER['DOCUMENT_ROOT']. "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT']. "/controllers/AlunoController.php";

    $alunoController = new AlunoController();

    $alunoController->cadastrarAluno();