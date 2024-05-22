
<!-- link dos icons do tema site -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- links cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/botãoseleçãostyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    


<header class="dark-header text-center" >
    <nav class="navbar navbar-expand-lg  .dark">
      <div >
      <div id="logoteste">
        <img src="assets/guaxinim2.png" id="logoguaxinim" width="50px" alt="Minha Imagem">
        <img src="assets/logoverbal.png " id="" class="mr-3" width="150px" alt="Minha Imagem">       
        </div>
      </div> 
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          
          <!--Descer para o menu de imoveis empresa-->
          <li class="nav-item">
            <a class="nav-link text-white" href="#funcinarios">Colaboradores</a>
          </li>
          <!--link pagina de contatos e soobre-->
          <!-- <li class="nav-item">
            <a class="nav-link text-white" href="https://web.whatsapp.com/send?phone=5577998786866" target="_blank">Whatsapp</a>
          </li> -->
          <!--link pagina de contatos e soobre-->
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Sobre Nós</a>
          </li>
         
          <!--Para sua empresa/ pessoa juridica-->
          <li class="nav-item">
            <a class="nav-link text-white" href="#empresa">Para empresa!</a>
          </li>
          <!--Casas pessoa fisica-->
          <li class="nav-item">
            <a class="nav-link text-white" href="#voce">Para você!</a>
          </li> 


          
          
          <!--Link duvidas-->
          
          <!-- <li class="nav-item">
            <div class="dropdown" data-bs-theme="Dark">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonDark" data-bs-toggle="dropdown" aria-expanded="false">
              tema</button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
                <li><a class="dropdown-item"  id="lightMode">Modo Claro</a></li>
                <li><a class="dropdown-item"  id="darkMode">Modo Escuro</a></li>
              
              </ul>
            </div>
          </li> -->
        </ul>
       

        <!-- <form class="d-flex mr-2 " role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form> -->
        
      </div>
      <div class="inline_telapqna">
      <div class="text-end ml-auto mr-2 align-content-center" >
        <h5 class="m-0 text-white" >
        <?php echo $_SESSION['usernome']; ?>
        </h5>
      </div>
      
        
        <div class="my-2" >
          <label class="toggle m-0">
        <input type="checkbox" id="themeCheckbox" />
        <div class="off-knob align-content-center text-center justify-content-center" id="darkMode"><i class="material-icons text-white">brightness_3</i></div>
        <div class="on-knob align-content-center text-black" id="lightMode"><i class="material-icons">wb_sunny</i></div>
      
        <svg viewBox="0 0 44 22" xmlns="http://www.w3.org/2000/svg">
          <rect
            class="outline"
            fill="none"
            rx="11"
            stroke-linejoin="round"
            stroke-linecap="round"
            stroke-width="1"
          />
          <rect
            class="outline outline--blur"
            fill="none"
            rx="11"
            stroke-linejoin="round"
            stroke-linecap="round"
            stroke-width="15"
          />
        </svg>
      </label>     
</div>
</div>
    </nav>
  </header >
  <script src="../JS/botãoseleção.js"></script>
 