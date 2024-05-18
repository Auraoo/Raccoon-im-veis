<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está logado
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Se estiver logado, redirecione-o para o outro site
    header("Location: home.php");
    exit();
} else {
    // Se não estiver logado, irá exir uma mensagem na tela
    echo "";
}
?>
