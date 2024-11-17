<?php

    include "funcoes.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $usuario=$_POST["usuario"];
        $senha=$_POST["senha"];
        $usuarioValido = false;

        //CARREGA OS USUÁRIOS DO ARQUIVO
        $usuarios=carregarUsuarios();

        //VERIFICA SE O USUÁRIO E A SENHA ESTÃO NO VETOR DE USUÁRIOS
        foreach($usuarios as $user) {
            if ($user["usuario"] === $usuario && $user["senha"] === $senha){
                $usuarioValido = true;
                break;
            }
        }

        if($usuarioValido){
            // DEFINE O COOKIE PARA O LOGIN POR 5 MINUTOS (300 SEGUNDOS)
            setcookie("usuario_logado", $usuario, time()+300, "/");
            header ("Location:index.php");
            exit;
        } else {
            echo "Usuário ou senha incorreto";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body id="telaLogin">

    <main id="conteudo">

    <div id="tituloELogo">
    <h2 id="titleLogin">Login de Usuário</h2>
    </div>

    <form action="login.php" method="POST" id="formLogin">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Digite a senha"required>

        <button id="acessar" type="submit">Entrar</button>
    </form>

    <div id="cadUsu">
    <a href="cadastro.php">Não tem cadastro? Clique aqui!</a>
    </div>    

    </main>

    </body>
    </html>