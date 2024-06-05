<?php
session_start();
require '../conexao/config.php';

if (isset($_SESSION['id_usuario']) && isset($_POST['theme'])) {
    $userId = $_SESSION['id_usuario'];
    $theme = $_POST['theme'];

    $stmt = $conexao->prepare("UPDATE usuario SET theme = ? WHERE ID = ?");
    $stmt->bind_param("si", $theme, $userId);

    if ($stmt->execute()) {
        echo "Tema atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o tema";
    }

    $stmt->close();
} else {
    echo "Dados inválidos";
}
$conexao->close();
?>
