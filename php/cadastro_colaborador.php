<?php
include 'conexao.php';

// Buscar os cargos do banco de dados
$query = "SELECT cod_funcao, cargo FROM tb_funcoes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Colaborador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Cadastro de Colaboradores</h2>

    <form action="/continuacao-senai/php/processa_cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="funcao">Função:</label>
        <select id="funcao" name="funcao" required>
            <option value="" disabled selected>Selecione uma função</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['cod_funcao']; ?>">
                    <?php echo $row['cargo']; ?>
                </
