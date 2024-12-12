<?php
include "conexao.php";
 $cargo = $_POST['cargo_digitado'];

//  1º Passo - Comando SQL
$sql = "INSERT INTO tb_funcoes
        (cargo) VALUES
        ('$dcargo')";

//  2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

//  3º Passo - Tentar executar
try{
    $inserir->execute();
    echo("<script>alert('cadastrado com sucesso!')
    window.location.href='/continuacao-senai/home.html'
    </script>");
}catch(PDOException $erro){
    echo "Falha ao inserir" . $erro->getMessage();
}


?>