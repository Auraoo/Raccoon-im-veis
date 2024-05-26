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
    $titulo = !empty($_POST['titulo']) ? $_POST['titulo'] : $imovel['titulo'];
    $cidade = !empty($_POST['cidade']) ? $_POST['cidade'] : $imovel['cidade'];
    $bairro = !empty($_POST['bairro']) ? $_POST['bairro'] : $imovel['bairro'];
    $tipo_imovel = !empty($_POST['tipo_imovel']) ? $_POST['tipo_imovel'] : $imovel['tipo'];
    $endereco = !empty($_POST['endereco']) ? $_POST['endereco'] : $imovel['endereco'];
    $preco = !empty($_POST['preco']) ? $_POST['preco'] : $imovel['preco'];
    $corretor = !empty($_POST['corretor']) ? $_POST['corretor'] : $imovel['id_corretor'];
    $disponibilidade = !empty($_POST['disponibilidade']) ? $_POST['disponibilidade'] : $imovel['disponibilidade'];
    $descricao = !empty($_POST['descricao']) ? $_POST['descricao'] : $imovel['descricao'];

    // Atualiza os dados do imóvel no banco de dados
    $sqlUpdate = "UPDATE Imoveis SET titulo=?, cidade=?, bairro=?, tipo=?, descricao=?, endereco=?, preco=?, id_corretor=?, disponibilidade=? WHERE id=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssisi", $titulo, $cidade, $bairro , $tipo_imovel, $descricao, $endereco, $preco, $corretor,$disponibilidade, $imovelId);
    $stmt->execute();

    // Redireciona de volta para a página de listagem de imóveis com uma mensagem de sucesso
    header('Location: adm_page.php#Imoveis');
    exit;
}

$conexao->close();
?>
