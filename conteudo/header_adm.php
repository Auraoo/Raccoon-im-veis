    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Image Example</title>
    <!-- link dos icons do tema site -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- links cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/botãoseleçãostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
      #logoteste{
        height: 60px;
      }
        #logoguaxinim {
            width: 40px;
            height: auto; /* Mantém a proporção da imagem automaticamente */
            transition: width 0.3s ease; /* Adiciona uma transição suave */
        }
        #logoguaxinim2 {
            margin-right: 20px !important;
        }
        @media (max-width: 557px) {
            #logoguaxinim {
                width: 50px;
                height: auto; /* Mantém a proporção da imagem automaticamente */
            }
            #logoguaxinim2 {
                width: 110px;
                margin-right: 0 !important;
            }
            #diminuirTP {
                width: 50px;
            }
        }
    </style>
    <header class="dark-header">
        <nav class="navbar navbar-expand-lg .dark">
            <div id="logoteste">
                <img src="assets/guaxinim2.png" id="logoguaxinim" alt="Minha Imagem">
                <img src="assets/logoverbal.png" id="logoguaxinim2" width="150px" alt="Minha Imagem">       
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#funcinarios">Colaboradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#empresa">Para empresa!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#voce">Para você!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="ADM_CRUD/adm_page.php">ADM</a>
                    </li>
                </ul>
            </div>
            <div class="search-container">
                            <form id="searchForm" action="imoveis.php" method="GET">
                                <input type="text" name="query" placeholder="Pesquisar produtos...">
                                <button type="submit">Pesquisar</button>
                            </form>
                        </div>
        <div class="ml-auto" >
            <div class="inline_telapqna">
                    <div class="align-content-center">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-0 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['usernome']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">alguma coisa</li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="sessao/logout.php">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="my-2 ml-2">
                        <label class="toggle m-0" id="diminuirTP">
                            <input type="checkbox" id="themeCheckbox">
                            <div class="off-knob align-content-center text-center justify-content-center" id="darkMode"><i class="material-icons text-white">brightness_3</i></div>
                            <div class="on-knob align-content-center text-center justify-content-center text-black" id="lightMode"><i class="material-icons">wb_sunny</i></div>
                            <svg viewBox="0 0 44 22" xmlns="http://www.w3.org/2000/svg">
                                <rect class="outline" fill="none" rx="11" stroke-linejoin="round" stroke-linecap="round" stroke-width="1"></rect>
                                <rect class="outline outline--blur" fill="none" rx="11" stroke-linejoin="round" stroke-linecap="round" stroke-width="15"></rect>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <script src="JS/botãoseleção.js"></script>
    <script>
        // animação da logo não verbal 
        var logo = document.getElementById("logoguaxinim");
        var imagemPadrao = "../guaxinim2.png";
        var imagemHover = "../assets/guaxinim1.png";

        // Adiciona imagem quando o mouse estiver em cima
        logo.addEventListener("mouseover", function() {
            this.src = imagemHover;
        });

        // Volta para imagem padrão quando o mouse sair de cima
        logo.addEventListener("mouseout", function() {
            this.src = imagemPadrao;
        });
    </script>
