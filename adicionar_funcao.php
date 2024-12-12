<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Adicionar Função</title>
</head>
<body>
    <h1>Adicionar Nova Função</h1>
    <nav>
        <a href="home.html">Voltar</a>
    </nav>
    <form method="POST" action="adicionar_funcao.php">
        <input type="text" name="cargo" placeholder="Nome da Função" required>
        <button type="submit">Adicionar</button>
    </form>

    <?php
    include 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cargo = $_POST['cargo'];
        $query = "INSERT INTO tb_funcoes (cargo) VALUES ('$cargo')";

        if ($conn->query($query) === TRUE) {
            echo "<p>Função adicionada com sucesso!</p>";
        } else {
            echo "<p>Erro: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
