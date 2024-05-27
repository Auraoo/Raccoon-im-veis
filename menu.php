<?php include 'conexao/config.php';

session_start();
?>
<h2>Opções de Perfil</h2>
<link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/botãoseleçãostyle.css">
<link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/botãoseleçãostyle.css">
 
    <div class="align-content-center">
        <div class="nav-item dropdown">
                            <a class="  dropdown-toggle px-0 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['usernome']; ?>
                            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item">alguma coisa</li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="sessao/logout.php">Sair</a></li>
            </ul>
        </div>
        <div class="" id="">
                <ul class=" ">
                    <li class="">
                        <a class="  text-white" href="#funcinarios">Colaboradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="  text-white" href="#empresa">Para empresa!</a>
                    </li>
                    <li class="nav-item">
                        <a class="  text-white" href="#voce">Para você!</a>
                    </li>
                    <?php 
                    if(isset($_SESSION['cargo_de_usuario'])) {
                        // Verificar o tipo de usuário
                        if($_SESSION['cargo_de_usuario'] == 1) {
                            // Tipo de usuário é 1, mostrar o cabeçalho de um jeito
                            echo '
                            <li class="nav-item">
                                <a class="  text-white" href="adm_page.php">ADM</a>
                            </li>';  // header para o cargo tipo 1 (adm)
                        } else {
                            // se o cargo de usuário fot diferente de 1, mostrar o cabeçalho de outro jeito
                            echo ''; // header para usuarios normais (logados mas sem ser adm)
                        }
                    } ?>
                    
                </ul>
            </div>
    </div>
    <script src="JS/botãoseleção.js"></script>
    <script src="../JS/botãoseleção.js"></script>




<div id="info" ></div>




