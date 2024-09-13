<?php
include '../conexao/config.php';

// Diretório de upload
$uploadDir = '../Raccoon-im-veis/uploads/';

// Verifica se o diretório de upload existe, se não, cria
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Processa a foto do corretor
if (isset($_FILES['foto_corretor']) && $_FILES['foto_corretor']['error'] == 0) {
    $fileName = basename($_FILES['foto_corretor']['name']);
    $targetFilePath = $uploadDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES['foto_corretor']['tmp_name'], $targetFilePath)) {
        $foto_corretor = $targetFilePath;
    } else {
        die('Erro ao fazer o upload da foto do corretor.');
    }
} else {
    die('Foto do corretor não foi fornecida ou houve um erro no upload.');
}

// Obtém dados do formulário
$nome_emp = $_POST['nome_emp'];
$email_emp = $_POST['email_emp'];
$telefone_emp = $_POST['telefone_emp'];
$biografia_emp = $_POST['biografia_emp'];
$id_corretora = $_POST['id_corretora'];

// Prepara a consulta SQL para inserir os dados na tabela corretor_emp
$sqlInsertCorretor = "INSERT INTO corretor_emp (foto_corretor, nome_emp, email_emp, telefone_emp, biografia_emp, id_corretora) VALUES (?, ?, ?, ?, ?, ?)";
$stmtCorretor = $conexao->prepare($sqlInsertCorretor);

if ($stmtCorretor === false) {
    die('Erro na preparação da consulta SQL: ' . htmlspecialchars($conexao->error));
}

$stmtCorretor->bind_param("sssssi", $foto_corretor, $nome_emp,$email_emp, $telefone_emp, $biografia_emp, $id_corretora);
$stmtCorretor->execute();

if ($stmtCorretor->error) {
    die('Erro ao executar a consulta SQL: ' . htmlspecialchars($stmtCorretor->error));
}

$stmtCorretor->close();
$conexao->close();

// Redireciona ou exibe uma mensagem de sucesso
header("Location: ../adm_page.php?success=1");
exit;
?>
