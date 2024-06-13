<?php
include_once '../conexao/config.php';
session_start();

// Obter a consulta de pesquisa
$query = isset($_GET['query']) ? urlencode($_GET['query']) : '';
$garagem = isset($_GET['garagem']) ? urlencode($_GET['garagem']) : '';
$suite = isset($_GET['suite']) ? urlencode($_GET['suite']) : ''; // Novo filtro para exemplo

// Redirecionar para a página de resultados com os parâmetros
header("Location: ../pesquisa_imoveis.php?query=$query&garagem=$garagem&suite=$suite");
exit;
?>