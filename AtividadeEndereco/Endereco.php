<?php

class Endereco{
    
    public $cep;
    public $logradouro;
    public $bairro;
    public $localidade;
    public $uf;
    public $dadosEndereco;

    public function buscarEndereco($cep){

        $resultado = file_get_contents("https://viacep.com.br/ws/$cep/json/");

        $dadosEndereco = json_decode($resultado, true);
        return $dadosEndereco;
    }

    public function imprimirEndereco($cep){
        $this->buscarEndereco($cep);

        echo 'CEP: '.$this->dadosEndereco['cep']; 
    }
}