<!-- link dos icons do tema site -->
<!-- link dos icons do tema site -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- links cdn  -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/botãoseleçãostyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



<header class="dark-header text-center">
  <nav class="navbar navbar-expand-lg justify-content-center .dark">
    <div id="logoteste" class="align-content-center "onclick="location.href='index.php';">
      <img src="assets/guaxinim2.png" id="logoguaxinim" alt="Minha Imagem">
      <img src="assets/logoverbal.png " id="logoguaxinim2" alt="Minha Imagem">
    </div>
    <div class="search-container">
      <form id="searchForm" class="d-flex" action="pesquisa_imoveis.php" method="GET">
        <input id="input_pesquisa" class="form-control mx-2" type="text" name="query" placeholder="Pesquisar produtos...">
      </form>
    </div>
    <ul id="acoes_C_L" class="navbar-nav d-flex">
      <li class="nav-item fundohover">
        <a class="nav-link text-white px-2" href="sessao/login.html"><i class="fas fa-sign-in-alt mr-1"></i><span class="tirartext">Faça seu Login</span></a>
      </li>

    </ul>

    <div class="inline_telapqna justify-content-end">


      <div class="my-2">
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
    </div>
  </nav>
</header>
<nav class="navbar navbar-expand-lg  bg-dark" style="margin-top:75px;">
  <div class="container-fluid">

    <button class="navbar-toggler bg-light " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><img src="assets/guaxinim-sem-fundo.ico" width="20px" alt="guaxinim"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!--link pagina de contatos e soobre-->
        <li class="nav-item fundohover2">
          <a class="nav-link text-white" href="index.php">Home</a>
        </li>

        <!--Descer para o menu de imoveis empresa-->
        <li class="nav-item fundohover2">
          <a class="nav-link text-white" href="index.php#corretores">Colaboradores</a>
        </li>

        <!--Para sua empresa/ pessoa juridica-->
        <li class="nav-item fundohover2">
          <a class="nav-link text-white" href="#empresa">Para empresa!</a>
        </li>
        <!--Casas pessoa fisica-->
        <li class="nav-item fundohover2">
          <a class="nav-link text-white" href="#voce">Para você!</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="JS/botãoseleção.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.getElementById('input_pesquisa').addEventListener('input', function() {
    document.getElementById('searchform').submit();
  });
</script>