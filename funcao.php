<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Logo Company</title>
</head>
<body>
    <header>
        <img src="./img/logomarca.png">
    </header>
    <div style="display: flex;">

        <nav>
            <script src="script.js"></script>
            <a href="./home.html"><img src="./img/home.png"> Home</a> <br>
            <a href="./gestaoPessoas.html"><img src="./img/pessoas.png"> Gestão de Pessoas</a><br>
            <a href="./funcoes.html"><img src="./img/funcoes.png"> Gestão de Funções</a><br>
            <a href="colaborador.html"><img src="./img/add.png"> Cadastrar Colaborador</a><br>
            <a href="funcao.html"><img src="./img/add.png"> Cadastrar Função</a> <br>
        </nav>
        
        <div style="margin-top: 2rem; margin-left: 2rem;">
            <h2 style="color: gray;">Cadastro de funções</h2><br>   

            <form action="inserirCargo.php" method="post">
                <label for="cargo">Cargo:</label>
                <input required type="text" id="cargo" name="cargo_digitado" style="background-color: #e5e5e5; border-radius:0.3rem; outline:none; border:none; padding:0.2rem;"> <br><br>
                <button type="submit" style="background-color: blue; color:#fff; padding:0.4rem; border-radius:0.7rem; outline:none; border:none; cursor: pointer; font-weight: 600;">Cadastrar</button>
            </form>

        </div>
        
    </div>

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
<script src="script.js"></script>
</html>