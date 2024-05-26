<?php
include_once 'conexao/config.php';
session_start();

// Verifica se o ID do produto foi passado na URL
if (!isset($_GET['id'])) {
    die('ID do produto não especificado.');
}

// Prevenir SQL Injection
$id = $conexao->real_escape_string($_GET['id']);

// Consultar o banco de dados para obter os detalhes do produto
$sql = "SELECT * FROM imoveis WHERE id = '$id'";
$result = $conexao->query($sql);

// Verificar se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta SQL: " . $conexao->error);
}

// Verificar se o produto foi encontrado
if ($result->num_rows == 0) {
    die("Produto não encontrado.");
}

// Obter os dados do produto
$produto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $produto['titulo']; ?> </title>
    <link rel="stylesheet" href="/Raccon-im-veis/CSS/style.css">
    <!-- Outros links de CSS, incluindo Bootstrap, se necessário -->
</head>
<body>
<?php
// Incluir o cabeçalho dependendo do tipo de usuário
if (isset($_SESSION['cargo_de_usuario'])) {
    if ($_SESSION['cargo_de_usuario'] == 1) {
        require 'conteudo/header_adm.php';
    } else {
        include 'conteudo/header_.php';
    }
} else {
    include 'conteudo/header.php';
}
?>
    <div class="produto-detalhes">
        <h1><?php echo $produto['titulo']; ?></h1>
        <img src="Raccoon-im-veis/<?php echo $produto['imagem_principal']; ?>" width="270px">
        <p><?php echo $produto['descricao']; ?></p>
        <p>Endereço: <?php echo $produto['endereco']; ?></p>
        <p>Preço: R$<?php echo $produto['preco']; ?></p>
    </div>
<?php include "conteudo/footer.php"; ?>
</body>
</html>
