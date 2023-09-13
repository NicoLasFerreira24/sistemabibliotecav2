<?php 
include('Endereco.php'); 

$endereco = new Endereco(); 
$cep = "17511-230"; 

$endereco->buscarEndereco($cep); 
$endereco->imprimirEndereco($cep);