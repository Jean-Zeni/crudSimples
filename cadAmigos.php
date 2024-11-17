<?php

include "funcoes.php";
//processa cadastro de amigos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amigo"]) && isset($_POST["fone"])) {
    $novoAmigo = $_POST["amigo"];
    $novoFone = $_POST["fone"];
    salvarAmigo($novoAmigo, $novoFone);
    echo "Nova amizade cadastrada com sucesso!";
    header("Location:index.php");
}

//Processa exclusão da amizade
if (isset($_GET["excluirAmigo"])) {
    $index = $_GET["excluirAmigo"];
    
    excluirAmigo($index);
    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Amigo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="telaCadAmigos">

    <h2 id="titleCadAmigo">Cadastrar Amizade</h2>

    <form id="formCadAmigo" method="POST">
        <label for="amigo">Nome:</label>
        <input type="text" name="amigo" id="amigo" placeholder="nome" required>
        <br>

        <label for="fone">Número:</label>
        <input type="number" name="fone" id="fone" placeholder="fone" required>
        <br>
        <button type="submit">Cadastrar</button>

    </form>

</body>

</html>