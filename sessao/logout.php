<?php
// Inicia a sessão
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Se deseja destruir completamente a sessão, também apague o cookie de sessão.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destrói a sessão
session_destroy();

// Redireciona para a página de login ou página inicial
header("Location: login.html");
exit;
?>
