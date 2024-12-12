<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Gerenciar Funções</title>
</head>
<body>
    <h1>Gerenciar Funções</h1>
    <nav>
        <a href="index.php">Voltar</a>
        <a href="adicionar_funcao.php">Adicionar Nova Função</a>
    </nav>

    <?php
    // Verifica se há um pedido para deletar uma função
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_query = "DELETE FROM tb_funcoes WHERE cod_funcao = $delete_id";

        if ($conn->query($delete_query) === TRUE) {
            echo "<p>Função deletada com sucesso!</p>";
        } else {
            echo "<p>Erro ao deletar função: " . $conn->error . "</p>";
        }
    }

    // Consulta para buscar todas as funções
    $query = "SELECT * FROM tb_funcoes";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Código</th><th>Cargo</th><th>Ações</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['cod_funcao']}</td>";
            echo "<td>{$row['cargo']}</td>";
            echo "<td>";
            echo "<a href='funcoes.php?delete_id={$row['cod_funcao']}' onclick=\"return confirm('Tem certeza que deseja excluir esta função?')\">Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhuma função encontrada.</p>";
    }
    ?>
</body>
</html>
