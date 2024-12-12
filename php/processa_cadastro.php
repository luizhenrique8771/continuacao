<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $funcao = $_POST['funcao'];
    $situacao = $_POST['situacao'];

    $stmt = $conn->prepare("INSERT INTO tb_colaboradores (nome, fk_funcao, situacao) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nome, $funcao, $situacao);

    if ($stmt->execute()) {
        echo "Colaborador cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar colaborador: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
