<?php
include 'conexao.php';

$filtro = isset($_GET['situacao']) ? $_GET['situacao'] : 'Todos';

$query = "SELECT * FROM vw_tudo";
if ($filtro === 'Ativo') {
    $query .= " WHERE situacao = 'Ativo'";
} elseif ($filtro === 'Inativo') {
    $query .= " WHERE situacao = 'Inativo'";
};

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pessoas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Gestão de Pessoas</h2>

    <div>
        <a href="?situacao=Todos"><button>Todos</button></a>
        <a href="?situacao=Ativo"><button>Ativos</button></a>
        <a href="?situacao=Inativo"><button>Inativos</button></a>
    </div>

    <div class="container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <strong>Matrícula:</strong> <?php echo $row['matricula']; ?> <br>
                    <strong>Nome:</strong> <?php echo $row['nome']; ?> <br>
                    <strong>Função:</strong> <?php echo $row['cargo']; ?> <br>
                    <strong>Situação:</strong> <?php echo $row['situacao']; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum colaborador encontrado.</p>
        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pessoas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Gestão de Pessoas</h2>

    <div>
        <a href="?situacao=Todos"><button>Todos</button></a>
        <a href="?situacao=Ativo"><button>Ativos</button></a>
        <a href="?situacao=Inativo"><button>Inativos</button></a>
    </div>

    <div class="container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="card">
                    <strong>Matrícula:</strong> <?php echo $row['matricula']; ?> <br>
                    <strong>Nome:</strong> <?php echo $row['nome']; ?> <br>
                    <strong>Função:</strong> <?php echo $row['cargo']; ?> <br>
                    <strong>Situação:</strong> <?php echo $row['situacao']; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum colaborador encontrado.</p>
        <?php endif; ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>