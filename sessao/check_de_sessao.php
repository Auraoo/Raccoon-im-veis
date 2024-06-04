<!-- check_login.php -->
<?php
if (!isset($_SESSION)) {
    session_start();

    // if (!$_SESSION['cargo_de_usuario'] == 1) {
    //     die("Area Restrita!!
    // <p><a href='../index.php'>Pagina Inicial</a></p>");
    // }

    header("Location: ../index.php");
}
?>