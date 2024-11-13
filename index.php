<?php
if (isset($_COOKIE['usuario_logado'])) {
    $usuario = htmlspecialchars($_COOKIE['usuario_logado']);
} else {
    header("Location:login.php");
    exit;
}

//CARREGA OS AMIGOS EXISTENTES NO ARQUIVO AMIGOS.TXT
function carregarAmigos()
{

    $amigos = [];

    if (file_exists("amigos.txt")) {
        $dados = file("amigos.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($dados as $linha) {
            list($amigo, $fone) = explode(":", $linha);
            $amigos[] = ["amigo" => $amigo, "fone" => $fone];
        }
    }
    return $amigos;
}

//SALVAR UM NOVO AMIGO NO ARQUIVO

function salvarAmigo($amigo, $fone)
{
    $linha = $amigo . ":" . $fone . PHP_EOL;
    file_put_contents("amigos.txt", $linha, FILE_APPEND);
}

//LISTA OS AMIGOS CADASTRADOS NO ARQUIVO AMIGOS.TXT

function listarAmigos()
{
    $amigos = carregarAmigos();
    echo "<ul>";

    foreach ($amigos as $index => $amg) {
        echo "<li>" . htmlspecialchars($amg["amigo"]) .
            "<a href='cadAmigos.php?excluir=" . $index . "'> Excluir </a> | " .
            "<a href='alterar.php?editar=" . $index . "'> Alterar </a></li>";
    }
    echo "</ul>";
}

 //EXCLUI AMIGOS DA LISTA DE AMIGOS
 function excluirAmigo($index) {
    $amigos = carregarAmigos();
    if(isset($amigos[$index])) {
        unset ($amigos[$index]);
        file_put_contents("amigos.txt", "");
        foreach ($amigos as $amg){
            salvarAmigo($amg["amigo"], $amg["fone"]);
        }
    }
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