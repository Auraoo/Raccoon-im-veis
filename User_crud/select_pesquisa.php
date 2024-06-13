<?php
include_once '../conexao/config.php';
session_start();

// Obter a consulta de pesquisa
$query = isset($_GET['query']) ? urlencode($_GET['query']) : '';
$garagem = isset($_GET['garagem']) ? urlencode($_GET['garagem']) : '';
$bairro = isset($_GET['bairro']) ? urlencode($_GET['bairro']) : '';
// Redirecionar para a página de resultados com os parâmetros
header("Location: ../pesquisa_imoveis.php?query=$query&garagem=$garagem&bairro=$bairro");
exit;
?>