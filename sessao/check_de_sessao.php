<!-- check_login.php -->
<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: index.php');
    exit();
} else {
    header('Location: ../mensagemlogar/informacao_mensagem.php');
    exit();
}
