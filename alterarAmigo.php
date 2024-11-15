<?php
include "funcoes.php";
if (isset($_GET["editar"])) {
    $index = $_GET["editar"];
    $amigos = carregarAmigos();
    if (isset($amigos[$index])) {
        $amigoAtual = $amigos[$index]["amigo"];
        $foneAtual = $amigos[$index]["fone"];
    } else {
        echo "Amizade não encontrada!";
        exit;
    }
}

//processa alteração amigo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["amigo"]) && isset($_POST["fone"])) {
    $novoAmigo = $_POST["amigo"];
    $novoFone = $_POST["fone"];
    alterarAmigo($index, $novoAmigo, $novoFone);
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Dados da Amizade</title>
</head>

<body>

    <h2>Alterar Dados do Amigo</h2>

    <form action="" method="post">
        <label for="amigo">Nome:</label>
        <input type="text" name="amigo" id="amigo" value="<?php echo htmlspecialchars($amigoAtual); ?>" required>

        <label for="fone">Telefone:</label>
        <input type="number" name="fone" id="fone" value="<?php echo htmlspecialchars($foneAtual); ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>

</html>