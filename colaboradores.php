<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Colaboradores</title>
</head>
<body>
    <h1>Colaboradores</h1>
    <nav>
        <a href="index.php">Voltar</a>
    </nav>
    <div>
        <button onclick="window.location.href='colaboradores.php?filtro=todos'">Todos</button>
        <button onclick="window.location.href='colaboradores.php?filtro=ativos'">Ativos</button>
        <button onclick="window.location.href='colaboradores.php?filtro=inativos'">Inativos</button>
    </div>

    <?php
    $filtro = $_GET['filtro'] ?? 'todos';

    $query = "SELECT tb_colaboradores.matricula, tb_colaboradores.nome, tb_funcoes.cargo, tb_colaboradores.situacao 
              FROM tb_colaboradores 
              LEFT JOIN tb_funcoes ON tb_colaboradores.fk_funcao = tb_funcoes.cod_funcao";

    if ($filtro === 'ativos') {
        $query .= " WHERE tb_colaboradores.situacao = 'Ativo'";
    } elseif ($filtro === 'inativos') {
        $query .= " WHERE tb_colaboradores.situacao = 'Inativo'";
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Matrícula</th><th>Nome</th><th>Cargo</th><th>Situação</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['matricula']}</td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['cargo']}</td>";
            echo "<td>{$row['situacao']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum colaborador encontrado.</p>";
    }
    ?>
</body>
</html>
