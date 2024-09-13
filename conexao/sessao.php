<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Buscar o usuário pelo email
    $query = "SELECT ID, senha, user_nome ,nome , email, cargo  FROM usuario WHERE email = ?";
    $stmt = mysqli_prepare($conexao, $query);
    
    // Verificar se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . mysqli_error($conexao));
    }
    
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    // Verificar se a execução da consulta foi bem-sucedida
    if (!$stmt) {
        die("Erro ao executar a consulta: " . mysqli_error($conexao));
    }

    mysqli_stmt_bind_result($stmt, $usuario_id, $senha_hash, $nome_user, $nome, $email ,$cargo);
    mysqli_stmt_fetch($stmt);

    if (password_verify($senha, $senha_hash)) { // Verificar se a senha corresponde ao hash armazenado
        // Senha correta
        session_start();
        $_SESSION['id_usuario'] = $usuario_id; // Armazenar o ID do usuário na sessão
        $_SESSION['usernome'] = $nome_user;
        $_SESSION['nome_usuario'] = $nome;
        $_SESSION['email_usuario'] = $email;
        $_SESSION['cargo_de_usuario'] = $cargo;
        $_SESSION['logado'] = true;
        header('Location: ../index.php');
    } else {
        // Senha incorreta
        echo "Email ou senha incorretos.";
    }

    $stmt->close();
    $conexao->close();
}
?>

