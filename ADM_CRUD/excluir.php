<?php
include '../conexao/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imovelId = $_POST['imovel_id'];

    // Consulta para obter os caminhos das imagens
    $sqlSelectImagens = "SELECT path FROM imagens WHERE imoveis_id = ?";
    $stmt = $conexao->prepare($sqlSelectImagens);
    $stmt->bind_param("i", $imovelId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Deleta as imagens do servidor
    while ($row = $result->fetch_assoc()) {
        $imagemPath = $row['path'];
        if (file_exists($imagemPath)) {
            unlink($imagemPath);
        }
    }
    $stmt->close();

    // Consulta para deletar as imagens do banco de dados
    $sqlDeleteImagens = "DELETE FROM imagens WHERE imoveis_id = ?";
    $stmt = $conexao->prepare($sqlDeleteImagens);
    $stmt->bind_param("i", $imovelId);
    $stmt->execute();
    $stmt->close();

    // Consulta para deletar o imóvel do banco de dados
    $sqlDeleteImovel = "DELETE FROM Imoveis WHERE id = ?";
    $stmt = $conexao->prepare($sqlDeleteImovel);
    $stmt->bind_param("i", $imovelId);
    $stmt->execute();
    $stmt->close();

    // Fecha a conexão
    $conexao->close();

    // Redireciona de volta para a página de listagem de imóveis com uma mensagem de sucesso
    header("Location: adm_page.php");
    exit;
} else {
    // Se o método de requisição não for POST, redireciona de volta
    header("Location: adm_page.php?erro_em_algo");
    exit;
}
?>
