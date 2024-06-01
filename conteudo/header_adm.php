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
            <div id="logoteste" class="align-content-center ">
                <img src="assets/guaxinim2.png" id="logoguaxinim" alt="Minha Imagem">
                <img src="assets/logoverbal.png" id="logoguaxinim2" width="150px" alt="Minha Imagem">       
            </div>
            <div class="search-container">
                            <form id="searchForm" class="d-flex" action="pesquisa_imoveis.php" method="GET">
                                <input id="input_pesquisa" class="form-control mx-2" type="text" name="query" placeholder="Pesquisar produtos...">
                            </form>
                        </div>
            <div class="ml-auto" >
                <div class="inline_telapqna">
                    <nav class="col-4  navbar fotomudartamanho navbar-expand-lg navbar-light p-1 justify-content-end align-items-center">
                       
                        <div  id="profileIcon" class=" color_button rounded-pill ">
                        <?php echo $_SESSION['usernome']; ?>
                        </div>
                    </nav>
                </div>
            </div>
        </nav>
    </header>
    
    <script src="JS/botãoseleção.js"></script>
    <script src="../JS/botãoseleção.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // animação da logo não verbal 
        var logo = document.getElementById("logoguaxinim");
        var imagemPadrao = "assets/guaxinim2.png";
        var imagemHover = "assets/guaxinim1.png";

        // Adiciona imagem quando o mouse estiver em cima
        logo.addEventListener("mouseover", function() {
            this.src = imagemHover;
        });

        // Volta para imagem padrão quando o mouse sair de cima
        logo.addEventListener("mouseout", function() {
            this.src = imagemPadrao;
        });
        document.getElementById('input_pesquisa').addEventListener('input', function() {
            document.getElementById('searchform').submit();
        }); 
    </script>
