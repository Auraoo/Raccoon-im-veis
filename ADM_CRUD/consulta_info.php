<?php
include '../conexao/config.php';

// Consulta SQL para obter todas as propriedades e suas imagens
$sql = "SELECT i.id, i.titulo, i.descricao, i.endereco, i.preco, i.id_corretor,i.imagem_principal, img.path, c.nome_emp AS nome_corretor
FROM Imoveis i
LEFT JOIN imagens img ON i.id = img.imoveis_id
LEFT JOIN corretor_emp c ON i.id_corretor = c.id_emp
ORDER BY i.id, img.id;";

$result = $conexao->query($sql);

$imoveis = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $imoveis[$row['id']]['id'] = $row['id'];
        $imoveis[$row['id']]['titulo'] = $row['titulo'];
        $imoveis[$row['id']]['descricao'] = $row['descricao'];
        $imoveis[$row['id']]['endereco'] = $row['endereco'];
        $imoveis[$row['id']]['preco'] = $row['preco'];
        $imoveis[$row['id']]['id_corretor'] = $row['id_corretor'];
        $imoveis[$row['id']]['nome_corretor'] = $row['nome_corretor'];
        $imoveis[$row['id']]['imagem_principal'] = $row['imagem_principal'];
        $imoveis[$row['id']]['imagens'][] = $row['path'];
        
    }
} else {
    echo "Nenhum imóvel encontrado.";
    exit;
}

$conexao->close();
?>