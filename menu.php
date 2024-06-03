<?php
session_start();
?>
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/botãoseleçãostyle.css">
<link rel="stylesheet" href="CSS/menu_style.css">

<div class="align-content-center mb-auto">
    <div class="" id="">
        <ul class="menu_lateral_ul ">
            <li class="link_navegação" onclick="location.href='index.php';">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </li>
            <li class="link_navegação" onclick="location.href='index.php#corretores';">
                <i class="fas fa-user-tie"></i>
                <span>Corretores</span>
            </li>
            <li class="link_navegação" onclick="location.href='index.php#localizacao';">
                <i class="fas fa-map-marker-alt"></i>
                <span>Localização</span>
            </li>
            <li class="link_navegação" onclick="location.href='pesquisa_imoveis.php';">
                <i class="fas fa-building"></i>
                <span>Imoveis</span>
            </li>
            <?php
            if (isset($_SESSION['cargo_de_usuario'])) {
                // Verificar o tipo de usuário
                if ($_SESSION['cargo_de_usuario'] == 1) {
                    // Tipo de usuário é 1, mostrar o cabeçalho de um jeito
                    echo '<a class="link_adm" href="adm_page.php">
                                <li class="link_navegação">
                                    <i class="fas fa-cogs"></i>
                                    <span>ADM</span>
                                </li>
                          </a>';  // header para o cargo tipo 1 (adm)
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