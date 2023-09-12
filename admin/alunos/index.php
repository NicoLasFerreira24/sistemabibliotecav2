<?php

    require_once $_SERVER['DOCUMENT_ROOT'] ."/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/controllers/AlunoController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] ."/models/Usuario.php";
?>

<main class="container mt-3 mb-3">
    <h1>Lista De Aluno</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Data</th>
                <th style="width: 200px;">Ação</th>
            </tr>
        </thead>
        <tbody>
    
        <?php
            $alunosController = new AlunoController();
            $alunos = $alunosController->listarAlunos();

            foreach($alunos as $aluno):
        ?>
        <tr>
            <td><?=$aluno->id_aluno?></td>
            <td><?=$aluno->nome?></td>
            <td><?=$aluno->cpf?></td>
            <td><?=$aluno->email?></td>
            <td><?=$aluno->telefone?></td>
            <td><?=$aluno->celular?></td>
            <td><?=$aluno->data_nascimento?></td>
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
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>