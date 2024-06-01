<?php
include_once 'conexao/config.php';
session_start();

// Verifica se o ID do produto foi passado na URL
if (!isset($_GET['id'])) {
  
  header('Location:../pesquisa_imoveis.php');
  die('ID do produto informado');
}

// Prevenir SQL Injection
$id = $conexao->real_escape_string($_GET['id']);

// consultando todos as tabelas e informações que envolve o "imovel"
$sql = "SELECT * ,imoveis.endereco AS endereco_imovel,corretora.endereco AS corretora_endereco
FROM imoveis
join imagens on imagens.imoveis_id = imoveis.id
join especificacao e on imoveis.id_especificacao = e.id
join corretor_emp on imoveis.id_corretor = corretor_emp.id_emp 
join corretora on corretor_emp.id_corretora = corretora.id  WHERE imoveis.id = '$id'";
$result = $conexao->query($sql);

//dando um cheack pra ver se deu certo a consulta
if ($result === false) {
  die("Erro na consulta SQL: " . $conexao->error);
}

// Verificar se o produto foi encontrado
if ($result->num_rows == 0) {
  die("Produto não encontrado.");
}

// Obter os dados e jogando na variavel imovel
$imovel = $result->fetch_assoc();

// Consulta para obter as imagens adicionais
$sql_imagens = "SELECT path FROM imagens WHERE imoveis_id = '$id'";
$result_imagens = $conexao->query($sql_imagens);

if ($result_imagens === false) {
  die("Erro na consulta SQL das imagens: " . $conexao->error);
}
?>