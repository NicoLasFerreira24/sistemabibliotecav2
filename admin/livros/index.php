<?php

    require_once $_SERVER['DOCUMENT_ROOT'] ."/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/LivroController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/models/Livro.php";
?>

<main class="container mt-3 mb-3">
    <h1>Lista De Livros</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>N°Paginas</th>
                <th>Preço</th>
                <th>A°Publicacao</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $livroController = new LivroController();
                $livros = $livroController->listarLivros();

                foreach($livros as $livro):
            ?>
            <tr>
                <td><?=$livro->id_livro?></td>
                <td><?=$livro->titulo?></td>
                <td><?=$livro->autor?></td>
                <td><?=$livro->numero_pagina?></td>
                <td><?=$livro->preco?></td>
                <td><?=$livro->ano_publicacao?></td>
                <td><?=$livro->isbn?></td>
                <td>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>

                </td>
            </tr>
            
            <?php
            endforeach;
            ?>

        </tbody>
    </table>
</main>
