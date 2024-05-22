<?php
include '../conexao/config.php';

// Verifica se o ID do imóvel foi enviado via POST
if (!isset($_POST['imovel_id'])) {
    echo "ID do imóvel não fornecido.";
    exit;
}

$imovelId = $_POST['imovel_id'];

// Consulta SQL para obter os dados do imóvel
$sql = "SELECT * FROM Imoveis WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $imovelId);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o imóvel existe
if ($result->num_rows === 0) {
    echo "Imóvel não encontrado.";
    exit;
}

$imovel = $result->fetch_assoc();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $endereco = $_POST['endereco'];
    $preco = $_POST['preco'];
    $corretor = $_POST['corretor'];

    // Atualiza os dados do imóvel no banco de dados
    $sqlUpdate = "UPDATE Imoveis SET titulo=?, descricao=?, endereco=?, preco=?, id_corretor=? WHERE id=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("ssssii", $titulo, $descricao, $endereco, $preco, $corretor, $imovelId);
    $stmt->execute();

    // Redireciona de volta para a página de listagem de imóveis com uma mensagem de sucesso
    header('Location: adm_page.php#Imoveis');
    exit;
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imóvel</title>
</head>
<body>
    <h1>Editar Imóvel</h1>
    <form method="POST">
        <!-- Campos para edição -->
    </form>
</body>
</html>
