<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Adicionar Novo Colaborador</title>
</head>
<body>
    <h1>Adicionar Novo Colaborador</h1>
    <nav>
        <a href="index.php">Voltar</a>
    </nav>

    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $fk_funcao = $_POST['fk_funcao'];
        $situacao = $_POST['situacao'];

        // Validação simples
        if (!empty($nome) && !empty($fk_funcao) && !empty($situacao)) {
            $query = "INSERT INTO tb_colaboradores (nome, fk_funcao, situacao) VALUES ('$nome', $fk_funcao, '$situacao')";

            if ($conn->query($query) === TRUE) {
                echo "<p>Colaborador adicionado com sucesso!</p>";
            } else {
                echo "<p>Erro ao adicionar colaborador: " . $conn->error . "</p>";
            }
        } else {
            echo "<p>Por favor, preencha todos os campos.</p>";
        }
    }

    // Busca as funções para preencher o select
    $funcoes_result = $conn->query("SELECT * FROM tb_funcoes");
    ?>

    <form method="POST" action="adicionar_colaborador.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="fk_funcao">Função:</label>
        <select name="fk_funcao" id="fk_funcao" required>
            <option value="">Selecione uma função</option>
            <?php while ($funcao = $funcoes_result->fetch_assoc()): ?>
                <option value="<?php echo $funcao['cod_funcao']; ?>">
                    <?php echo $funcao['cargo']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="situacao">Situação:</label>
        <select name="situacao" id="situacao" required>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>
