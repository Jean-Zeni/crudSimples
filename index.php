<?php

    include "funcoes.php";

if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header("Location:login.php");
    exit;
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

<body id="telaIndex">

    <header id="cabecalho">

        <strong>AGENDA</strong>

        <a href="./cadAmigos.php">Cadastrar</a>

    </header>
 
    <div id="tabela">
    <h1>Bem-vindo, <?php echo $usuario; ?>!</h1>
    <?php listarAmigos(); ?>

    <form method="post" action="logout.php">
        <button type="submit">Sair</button>
    </form>
    </div>

</body>

</html>