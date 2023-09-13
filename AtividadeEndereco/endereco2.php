<?php

    if(isset($_POST['cep']) && !empty($_POST['cep'])){
       
        $cep = $_POST['cep'];
        $resultado = file_get_contents("https://viacep.com.br/ws/$cep/json/");

        $dadosEndereco = json_decode($resultado, true);

        //var_dump($dadosEndereco);

    }else {

        header("location:buscar-endereco.php");
        exit;
    }

?>


<html> 
    <head>
        <meta charset="uft-8">
        <title> Pesquisar Endereço </title>
    </head>
    <body>
        <h1>Endereço</h1>
        <hr>
        <p>CEP: <?=$dadosEndereco['cep'] ?> </p>
        <p>Logradouro: <?=$dadosEndereco['logradouro'] ?> </p>
        <p>Bairro: <?=$dadosEndereco['bairro'] ?> </p>
        <p>Cidade: <?=$dadosEndereco['localidade']?> </p>
        <p>Estado: <?=$dadosEndereco['uf']?> </p>
    </body>
</html>