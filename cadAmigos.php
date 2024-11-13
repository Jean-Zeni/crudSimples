<?php

include "funcoes.php";
//processa cadastro de amigos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amigo"]) && isset($_POST["fone"])) {
    $novoAmigo = $_POST["amigo"];
    $novoFone = $_POST["fone"];
    salvarAmigo($novoAmigo, $novoFone);
    echo "Nova amizade cadastrada com sucesso!";
}

//Processa exclusão da amizade
if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirAmigo($index);
    header("Location:cadAmigos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Amigo</title>
</head>

<body>

    <h2>Cadastrar Amizade</h2>

    <form action="cadAmigos.php" method="post">
        <input type="text" name="amigo" id="amigo" placeholder="amigo" required>
        <br>

        <input type="number" name="fone" id="fone" placeholder="fone" required>
        <br>
        <button type="submit">Cadastrar</button>

    </form>

</body>

</html>