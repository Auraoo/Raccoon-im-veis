<?php
session_start();
$mostrarModal = false;

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    $mostrarModal = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raccoon Imóveis</title>
    <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">

    <link rel="stylesheet" href="Raccon-im-veis/CSS/style.css">
    <!-- link css bootstratp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- link dos icons do site -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- link para abrir tela via ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- link do css do menu lateral -->
<link rel="stylesheet" href="CSS/menu_style.css">



</head>
<style>

/* caixa de de informação */
.modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            align-content: center;
        }
        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

/* style do swiper  */
    swiper-container {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    </style>
<body id="dark">
  
<?php
// Verificar se o usuário está logado e possui um tipo definido na sessão
if(isset($_SESSION['cargo_de_usuario'])) {
    // Verificar o tipo de usuário
    if($_SESSION['cargo_de_usuario'] == 1) {
        // Tipo de usuário é 1, mostrar o cabeçalho de um jeito
        require 'conteudo/header_adm.php';  // header para o cargo tipo 1 (adm)
    } else {
        // se o cargo de usuário fot diferente de 1, mostrar o cabeçalho de outro jeito
        include 'conteudo/header_.php'; // header para usuarios normais (logados mas sem ser adm)
    }
} else {
    // se não estiver na sessão (logado) mostra o header com botão de login e cadastro
    include 'conteudo/header.php';
}

?>

  <!--Background fixo video-->
  <!--Conteudoo-->
  <div class="video-background">
    <div class="video-foreground">
      <video loop muted autoplay>
        <source src="./assets/test mesa.mp" type="video/mp4">
        Seu navegador não suporta vídeos em HTML5.
      </video>
    </div>
    <div class="text-over-video">
      <h2 class="animacaotext" >Bem-vindo(a) a Raccoon!</h2>
    </div>
  </div>
  
    <div id="profileFrame" class="frame" >
        <!-- Aqui será carregado o conteúdo via Ajax -->
    </div>

    <!--SECTION CONTEUDO-->
    <main>
                
          <div class="b-example-divider" style ></div>
          
          <div class="container col-xxl-8 px-4 py-5">
              <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6 zoom-effect">
                  <img src="./assets/imagem contrato.webp" class="d-block mx-lg-auto img-fluid" alt="Imagen contrato" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                  <h1 class="display-5 fw-bold  lh-1 mb-3">Não perca tempo!</h1>
                  <p class="lead">"Descubra o conforto e a conveniência do aluguel de casas com a Raccoon Imóveis. Oferecemos uma variedade de opções de residências, desde casas acolhedoras até espaçosas, para atender às suas necessidades. Conte com nossa equipe para encontrar o lar perfeito para você, tornando sua experiência de aluguel simples e satisfatória. Entre em contato agora para começar a sua busca!"
                  </p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" onclick="checkLogin()"class="btn btn-primary btn-lg px-4 me-md-2 mr-2">E-mail</button>
                    <button type="button" onclick="checkLogin()" class="btn btn-outline-secondary btn-lg px-4">Contato!</button>
                  </div>
                </div>
              </div>
            </div>
        </main>
        <?php include 'mensagemlogar/informacao_mensagem.php' ?>


        
    <section class="mb-4" id="corretores">
        <h4>conheça nossos corretores!</h4>
            <swiper-container  class="mySwiper mb-2" pagination="true" pagination-clickable="true" slides-per-view="2" space-between="30" free-mode="true">
                <?php include 'ADM_CRUD/corretores_mostrar.php' ?>
            </swiper-container>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>


    
    <?php require 'conteudo/footer.php' ?>
    <script>
        // fin do link para abrir tela
       // animação da logo não verbal 
    var logo = document.getElementById("logoguaxinim");
    var imagemPadrao = "assets/guaxinim2.png";
    var imagemHover = "assets/guaxinim1.png";
    
    // Adiciona imagem quando o mause estiver em cima
    logo.addEventListener("mouseover", function() {
        this.src = imagemHover;
    });
    
    // volta para imagem padrao quando o mause sair de cima
    logo.addEventListener("mouseout", function() {
        this.src = imagemPadrao;
    });
    </script>
    <script src="JS/botãoseleção.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/menu_script.js"></script>
</body>
</html>