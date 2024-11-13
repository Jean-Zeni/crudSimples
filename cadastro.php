<?php
    include "funcoes.php";
    //processa cadastro usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
        $novoUsuario = $_POST["usuario"];
        $novaSenha = $_POST["senha"];
        salvarUsuario($novoUsuario, $novaSenha);
        echo "Usuário cadastrado com sucesso!";
    }

    //Processa exclusão do usuário
    if(isset($_GET["excluir"])) {
        $index = $_GET["excluir"];
        excluirUsuario($index);
        header ("Location:cadastro.php");
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Usuários</title>
    </head>
    <body>

        <h2>Cadatre um Novo Usuário</h2>

        <form action="cadastro.php" method="post">
            <input type="text" name="usuario" id="usuario" placeholder="usuario" required>
            <br>

            <input type="password" name="senha" id="senha" placeholder="senha" required>
            <br>
            <button type="submit">Cadastrar</button>

        </form>

        <h3>Usuários Cadastrados</h3>
        <?php listarUsuarios(); ?>

        <a href="login.php">Voltar</a>

    </body>
    </html>

