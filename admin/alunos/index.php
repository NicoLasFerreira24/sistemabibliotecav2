<?php

 

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

 

    require_once $_SERVER['DOCUMENT_ROOT']. "/controllers/AlunoController.php";

 

?>

 

    <MAIN class="container mt-3 mb-3">

        <h1>lista de alunos</h1>

 

            <table class="table table-striped">

            <thead>

               

                <tr>

                    <th>#</th>

                    <th>nome</th>

                    <th>cpf</th>

                    <th>E-mail</th>

                    <th>telefone</th>

                    <th>celular</th>

                    <th>data_nascimento</th>

                    <th style ="width: 200px;"ação>ação</th>

 

                </tr>

 

            </thead>

            <tbody>

    <?php

 

        $AlunoController = new AlunoController();

 

        $aluno = $AlunoController->listaraluno();

 

        //var_dump($usuario);

        foreach($aluno as $aluno):

   

 

    ?>

 

                <tr>

                    <td><?=$aluno->id_aluno ?></td>

                    <td><?=$aluno->nome ?></td>

                    <td><?=$aluno->cpf ?></td>

                    <td><?=$aluno->email ?></td>

                    <td><?=$aluno->telefone ?></td>

                    <td><?=$aluno->celular ?></td>

                    <td><?=$aluno->data_nascimento ?></td>

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