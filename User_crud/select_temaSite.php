<?php
session_start();
require '../conexao/config.php';

if (isset($_SESSION['id_usuario'])) {
    $userId = $_SESSION['id_usuario'];

    $stmt = $conexao->prepare("SELECT theme FROM usuario WHERE ID = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $theme = $row['theme'];
        echo $theme;
    } else {
        echo "light"; // Define um tema padrão caso não haja registro no banco de dados
    }

    $stmt->close();
} else {
    echo "light"; // Define um tema padrão se o usuário não estiver logado
}
$conexao->close();
?>