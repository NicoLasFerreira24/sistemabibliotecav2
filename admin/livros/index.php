<?php

 

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

 

    require_once $_SERVER['DOCUMENT_ROOT']. "/controllers/LivroController.php";

 

?>

 

    <MAIN class="container mt-3 mb-3">

        <h1>lista de Livros</h1>

 

            <table class="table table-striped">

            <thead>

               

                <tr>

                    <th>#</th>

                    <th>titulo</th>

                    <th>autor</th>

                    <th>numero_pagina</th>

                    <th>preco</th>

                    <th>ano_publicacao</th>

                    <th>isbn</th>

                    <th style ="width: 200px;"ação>ação</th>

 

                </tr>

 

            </thead>

            <tbody>

    <?php

 

        $LivroController = new LivroController();

 

        $livro = $LivroController->listarlivro();

 

        //var_dump($usuario);

        foreach($livro as $livro):

   

 

    ?>

 

                <tr>

                    <td><?=$livro->id_livro ?></td>

                    <td><?=$livro->titulo ?></td>

                    <td><?=$livro->autor ?></td>

                    <td><?=$livro->numero_pagina ?></td>

                    <td><?=$livro->preco ?></td>

                    <td><?=$livro->ano_publicacao ?></td>

                    <td><?=$livro->isbn ?></td>

                    <td>

                        <a href="#"class ="btn btn-primary">Editar</a>

                        <a href="#"class ="btn btn-danger">Excluir</a>

 

                    </td>

 

                    </tr>

 

                    <?php

                        endforeach;

                    ?>

 

 

            </tbody>

        </table>

 

    </MAIN>

 

    <?php

 

require_once $_SERVER['DOCUMENT_ROOT']. "/includes/rodape.php";

 

 

?>