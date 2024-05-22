
<!-- link dos icons do tema site -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- links cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      
        @media (max-width: 557px) {
           .btn_tamanho{
            width: 50px;
           }
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
            .tirartext{
              display:none;
            }
        }
    </style>

<header class="dark-header text-center" >
    <nav class="navbar navbar-expand-lg  .dark">
      <div id="logoteste">
        <img src="assets/guaxinim2.png"   id="logoguaxinim" width="50px" alt="Minha Imagem">
        <img src="assets/logoverbal.png " id="logoguaxinim2" class="mr-3" width="150px" alt="Minha Imagem">       
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          
          <!--Descer para o menu de imoveis empresa-->
          <li class="nav-item">
            <a class="nav-link text-white" href="#funcinarios">Colaboradores</a>
          </li>

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

        </ul>

        <ul class="navbar-nav">
        
       
        <li class="nav-item fundohover">
            <a class="nav-link text-white" href="sessao/login.html" ><i class="fas fa-sign-in-alt"></i>Login</a>
          </li>
          <li class="nav-item fundohover">
            <a class="nav-link text-white" href="sessao/cadastroJ_F.html" ><i class="fas fa-user-plus"></i> Cadastro</a>
          </li>
        </ul>
      </div>
      <div class="inline_telapqna">
    
      
        <div class="containeresconder ml-auto" >
            <div class="fundohover align-content-center btn_tamanho" >
             <a class="nav-link text-white" href='sessao/login.html' ><i class="fas fa-sign-in-alt"></i><span class="tirartext">Login</span><hrclass="m-0" ></a>
            </div>
            <div class="fundohover align-content-center btn_tamanho" >
             <a class="nav-link text-white" href='sessao/cadastroJ_F.html'><i class="fas fa-user-plus"></i> <span class="tirartext">Cadastro</span></a>
            </div>
        </div>
        <div class="my-2" >
          <label class="toggle m-0" id="diminuirTP" >
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
  <script src="JS/botãoseleção.js"></script>
 