<!-- check_login.php -->
<?php
if (!isset($_SESSION)) {
    session_start();

    if (!$_SESSION['cargo_de_usuario'] == 1) {
        
        header("Location: ../index.php");
    }

    
}
?>