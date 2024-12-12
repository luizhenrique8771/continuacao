<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'base_colaboradores';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
