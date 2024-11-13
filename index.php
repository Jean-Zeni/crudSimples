<?php
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
</head>

<body>

    <header>

        <strong>AGENDA</strong>

        <button>Cadastrar</button>

    </header>

    <h1>Bem-vindo, <?php echo $usuario; ?>!</h1>
    <!-- <p>Você está autenticado no sistema.</p> -->

    <form method="post" action="logout.php">
        <button type="submit">Sair</button>
    </form>

</body>

</html>