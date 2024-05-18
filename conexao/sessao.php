<?php 
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar e executar a consulta SQL
    $stmt = $conexao->prepare("SELECT ID,nome , email, cargo FROM usuario WHERE email = ? AND senha = ?");

    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário encontrado
        $user = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $user['ID'];
        $_SESSION['nome_usuario'] = $user['nome'];
        $_SESSION['email_usuario'] = $user['email'];
        $_SESSION['cargo_de_usuario'] = $user['cargo'];

        header('Location: ../home.php');
    } else {
        echo "Email ou senha incorretos.";
    }

    $stmt->close();
    $conexao->close();
}
?>
