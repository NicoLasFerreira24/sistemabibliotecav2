<html>
    <head>
        <meta charset = "utf-8">
        <title> Gerador de Senha </title>

        <style>
            .boxSenha{
                border: 1px solid #cccccc;
                display: inline-block;
                padding: 20px;
                width: 50px;
                text-align: center;
                background-color: #6EB4EA;
                font-size: 20px;
                color: black;
                font-weight: bold;
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Gerador de Senha</h1>

        <form action="gerador-senha.php" method="get">
            <label for="qtdeSenha">Quantidade de Senhas</label> 
            <br>
            <input name="qtdeSenha" type="text" id="qtdeSenha"> 
            <br>
            <button type="submit">Gerar</button>
            <a href="gerador-senha.php">Cancelar Senhas </a>
        </form>

        <hr>

        <?php
            if(isset($_GET['qtdeSenha'])):               
        ?>
            <?php for ($i = 1; $i <= $_GET['qtdeSenha']; $i++): ?>
             <div class="boxSenha">
                    <?= $i ?>
            </div>
            <?php endfor;?>

        <?php
            endif;
        ?>

        <hr>
        <p> 
            Copyright &COPY; <?=date("Y") ?> - Todos os direitos são reservados
        </p>
        

    </body>
</html> 