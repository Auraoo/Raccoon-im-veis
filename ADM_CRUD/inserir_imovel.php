<?php 
include '../conexao/config.php';

// Obtém dados do formulário
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro']; 
$endereco = $_POST['endereco'];
$preco = $_POST['preco'];
$tipo = $_POST['tipo_imovel'];
$finalidade = $_POST['finalidade'];
$corretor = $_POST['corretorid'];
$disponibilidade = $_POST['disponibilidade'];

// campos da tabela especificacao
$quartos = $_POST['quartos'];
$garagem = $_POST['garagem'];
$area_contruida = $_POST['area_construida'];
$banheiro = $_POST['banheiro'];

// Diretório de upload
$uploadDir = '../Raccoon-im-veis/uploads/';


// Prepara a consulta SQL para inserir os dados na tabela especificacao
$sqlInsertEspecificacao = "INSERT INTO especificacao (quartos, garagem, area_contruida, banheiro) VALUES (?, ?, ?, ?)";
$stmtEspecificacao = $conexao->prepare($sqlInsertEspecificacao);

if ($stmtEspecificacao === false) {
    die('Erro na preparação da consulta SQL: ' . htmlspecialchars($conexao->error));
}

$stmtEspecificacao->bind_param("isss", $quartos, $garagem, $area_contruida, $banheiro);
$stmtEspecificacao->execute();

if ($stmtEspecificacao->error) {
    die('Erro ao executar a consulta SQL: ' . htmlspecialchars($stmtEspecificacao->error));
}

$id_especificacao = $stmtEspecificacao->insert_id;
$stmtEspecificacao->close();

if (isset($_FILES['imagemdefault']) && $_FILES['imagemdefault']['error'] == 0) {
    $fileName = basename($_FILES['imagemdefault']['name']);
    $targetFilePath = $uploadDir . time() . "_" . $fileName;
    
    if (move_uploaded_file($_FILES['imagemdefault']['tmp_name'], $targetFilePath)) {
        $imagem_principal = $targetFilePath;
    } else {
        die('Erro ao fazer o upload da imagem principal.');
    }
} else {
    die('Imagem principal não foi fornecida ou houve um erro no upload.');
}
// Prepara a consulta SQL para inserir os dados do imóvel
$sqlInsertPropriedade = "INSERT INTO Imoveis (titulo, descricao ,cidade,bairro, endereco, preco, imagem_principal,disponibilidade, tipo, finalidade, id_corretor, id_especificacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtPropriedade = $conexao->prepare($sqlInsertPropriedade);

if ($stmtPropriedade === false) {
    die('Erro na preparação da consulta SQL : ' . htmlspecialchars($conexao->error));
}

$stmtPropriedade->bind_param("ssssssssssis", $titulo, $descricao, $cidade, $bairro, $endereco, $preco, $imagem_principal,$disponibilidade, $tipo, $finalidade, $corretor, $id_especificacao);
$stmtPropriedade->execute();

if ($stmtPropriedade->error) {
    die('Erro ao executar a consulta SQL: ' . htmlspecialchars($stmtPropriedade->error));
}

$propriedadeId = $stmtPropriedade->insert_id;
$stmtPropriedade->close();



// Processa cada arquivo de imagem
$imagePaths = [];
foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $fileName = basename($_FILES['images']['name'][$key]);
    $targetFilePath = $uploadDir . time() . "_" . $fileName;
    
    // Move o arquivo para o diretório de upload
    if (move_uploaded_file($tmp_name, $targetFilePath)) {
        $imagePaths[] = $targetFilePath;
        
        // Insere o caminho da imagem na tabela de imagens
        $sqlInsertImagem = "INSERT INTO imagens (imoveis_id, path) VALUES (?, ?)";
        $stmtImagem = $conexao->prepare($sqlInsertImagem);

        if ($stmtImagem === false) {
            die('Erro na preparação da consulta SQL para imagens: ' . htmlspecialchars($conexao->error));
        }

        $stmtImagem->bind_param("is", $propriedadeId, $targetFilePath);
        $stmtImagem->execute();

        if ($stmtImagem->error) {
            die('Erro ao executar a consulta SQL para imagens: ' . htmlspecialchars($stmtImagem->error));
        }

        $stmtImagem->close();
    }
}

// Fecha a conexão
$conexao->close();

// Redireciona ou exibe uma mensagem de sucesso
header("Location: ../adm_page.php?success=1");
exit;
?>
