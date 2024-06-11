    <!-- link dos icons do tema site -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- links cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/botãoseleçãostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <header class="dark-header header_site">
    <nav class="navbar navbar-expand-lg .dark">
        <div id="logoteste" class="align-content-center " onclick="location.href='index.php';">
            <img src="assets/guaxinim2.png" id="logoguaxinim" alt="Minha Imagem">
            <img src="assets/logoverbal.png" id="logoguaxinim2" width="150px" alt="Minha Imagem">
        </div>
        <div class="search-container">
            <form id="searchForm" class="d-flex" action="pesquisa_imoveis.php" method="GET">
                <input id="input_pesquisa" class="form-control mx-2" type="text" name="query" placeholder="Pesquisar produtos..."autocomplete="off">
            </form>
        </div>
        <div class="ml-auto">
            <div class="inline_telapqna">
                <nav class="col-4  navbar fotomudartamanho navbar-expand-lg navbar-light p-1 justify-content-end align-items-center">
                <div class="mx-2">
        <label class="toggle m-0" id="diminuirTP">
          <input type="checkbox" id="themeCheckbox" />
          <div class="off-knob align-content-center text-center justify-content-center" id="darkMode"><i class="material-icons text-white">brightness_3</i></div>
          <div class="on-knob align-content-center text-black" id="lightMode"><i class="material-icons">wb_sunny</i></div>

          <svg viewBox="0 0 44 22" xmlns="http://www.w3.org/2000/svg">
            <rect class="outline" fill="none" rx="11" stroke-linejoin="round" stroke-linecap="round" stroke-width="1" />
            <rect class="outline outline--blur" fill="none" rx="11" stroke-linejoin="round" stroke-linecap="round" stroke-width="15" />
          </svg>
        </label>
      </div>
                    <div id="profileIcon" class="d-flex text-white align-items-center color_button rounded-pill ">
                    <h5 class="my-auto" ><?php echo $_SESSION['usernome']; ?></h5>    
                        <span id="elementoHTML"><i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_left</i></span>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
</header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>