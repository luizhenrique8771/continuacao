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
            <a href="./funcoes.php"><img src="./img/funcoes.png"> Gestão de Funções</a><br>
            <a href="colaborador.php"><img src="./img/add.png"> Cadastrar Colaborador</a><br>
            <a href="funcao.php"><img src="./img/add.png"> Cadastrar Função</a> <br>
        </nav>
        
        <div style="margin-top: 2rem; margin-left: 2rem;">
            
            <form action="inserir.php">
            <h2 style="color: gray;">Cadastro de Colaboradores</h2><br>   
            <label for="cargo">Nome:</label>
            <input required type="text" id="cargo" style="background-color: #e5e5e5; border-radius:0.3rem; outline:none; border:none; padding:0.2rem;"> 
            <br><br>

            <label for="funcao">Função</label>

            <select id="funcao" style="border-radius: 0.2rem;" required>
                <option value="" disabled selected>Selecione</option>
                <option value="gerente">Gerente</option>
                <option value="Aux. de Serv. Gerais">Aux. de Serv. Gerais</option>
                <option value="Estoquista">Estoquista</option>
            </select><br><br>

            <label for="situacao">Situação</label>

            <select required id="situacao">
                <option value="" disabled selected>Selecione</option>
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </select><br><br>

            <button type="submit" style="background-color: blue; color:#fff; padding:0.4rem; border-radius:0.7rem; outline:none; border:none; cursor: pointer; font-weight: 600;">Cadastrar</button>
        </form>
    </div>

    
    
</div>

<?php
    include 'conexao.php';
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
<script src="script.js"></script>
</html>