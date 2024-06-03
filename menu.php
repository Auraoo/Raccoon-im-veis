<?php
session_start();
?>
<h2>Opções de Perfil</h2>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/botãoseleçãostyle.css">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/botãoseleçãostyle.css">

<div class="align-content-center mb-auto">
    <div class="nav-item dropdown">
        <a class="  dropdown-toggle px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['usernome']; ?>
        </a>
        <ul class="dropdown-menu">
            <li class="dropdown-item">alguma coisa</li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
        </ul>
    </div>
    <div class="" id="">
        <ul class=" ">
            <li class="">
                <a href="#funcinarios">Colaboradores</a>
            </li>
            <li class="nav-item">
                <a href="#empresa">Para empresa!</a>
            </li>
            <li class="nav-item">
                <a href="#voce">Para você!</a>
            </li>
            <?php
            if (isset($_SESSION['cargo_de_usuario'])) {
                // Verificar o tipo de usuário
                if ($_SESSION['cargo_de_usuario'] == 1) {
                    // Tipo de usuário é 1, mostrar o cabeçalho de um jeito
                    echo '
                            <li class="nav-item">
                                <a  href="adm_page.php">ADM</a>
                            </li>';  // header para o cargo tipo 1 (adm)
                } else {
                    // se o cargo de usuário fot diferente de 1, mostrar o cabeçalho de outro jeito
                    echo ''; // header para usuarios normais (logados mas sem ser adm)
                }
            } ?>

        </ul>
    </div>
</div>
<div>
    <button class="btn btn-danger mt-auto" style=" position: fixed;
            bottom: 20px;
            right: 10%;" type="button" onclick="location.href='sessao/logout.php';">Sair</button>
</div>
<script src="JS/botãoseleção.js"></script>
<script src="../JS/botãoseleção.js"></script>




<div id="info"></div>