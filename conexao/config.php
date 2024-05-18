<?php
// Dados de conexão com o banco de dados
$servername = "localhost"; // endereço do servidor  (servidor Xampp)
$username = "root"; // nome de usuário do MySQL
$password = ""; // senha do MySQL (root não tem senha)
$database = "imobiliaria"; // nome do banco de dados criado no work bench

// Criando a conexão com bancode dados
$conexao = mysqli_connect($servername, $username, $password, $database);

// Verifica a conexão está ok 
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
?>