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

  <!-- link css bootstratp -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <!-- link dos icons do site -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- link para abrir tela via ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- link da mensagem logar -->
  <link rel="stylesheet" href="CSS/mensagem_logar.css">



</head>

<body id="dark">

  <?php
  // Verificar se o usuário está logado e possui um tipo definido na sessão
  if (isset($_SESSION['cargo_de_usuario'])) {
    // Verificar o tipo de usuário
    if ($_SESSION['cargo_de_usuario'] == 1) {
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
        <source src="https://videos.pexels.com/video-files/7578552/7578552-hd_1280_720_30fps.mp4" type="video/mp4">

      </video>
    </div>
    <div class="text-over-video">
      <h2 class="animacaotext">Bem-vindo(a) a Raccoon!</h2>
    </div>
  </div>

  <div id="profileFrame" class="frame menu_dark letras_color_dark">
    <!-- Aqui será carregado o conteúdo via Ajax -->
  </div>

  <!--SECTION CONTEUDO-->

  <hr>
  <!--CARD DOS IMOVEIS-->
  <div class="container-fluid my-3">
    <h2>Conheça nossos imóveis!</h2>
    <swiper-container class="mySwiper mb-2" pagination="true" pagination-clickable="true" slides-per-view="5" space-between="30" free-mode="true">
      <?php
      include './User_crud/mostrar_imoveis.php';
      ?>
    </swiper-container>
  </div>
  <!--FIM-->
  <hr>
  <!--Conteudo informativo, sem muita alteracao-->

  <div class="container-fluid my-4">
    <h3>Depoimentos</h3>
    <div class="row">
      <div class="col-md-6 zoom-effect">
        <img src="/assets/richard.png" class="img-fluid rounded float-left" alt="Imagem 1" width="150" style="margin: 10px;">
        <h5>Richard Machado</h5>
        <p>Recomendo a Raccon Imóveis pelo atendimento excepcional e transparência. Com um portfólio diversificado, atendem a todas as necessidades. Confiança e satisfação são garantidas, tornando-os a escolha ideal para um novo lar ou investimento seguro.</p>
      </div>
      <div class="col-md-6 zoom-effect">
        <img src="/assets/luiza-sonza.jpg" class="img-fluid rounded float-left" alt="Imagem 1" width="150" style="margin: 10px; ">
        <h5>Luiza Sonza</h5>
        <p>A experiência na Raccon Imóveis foi incrível! Atendimento excepcional, transparência nas negociações e um portfólio diversificado que atendeu todas as minhas necessidades. Recomendo de olhos fechados!</p>
      </div>
    </div>
  </div>
  <br>
  <br>
  <!--section localizacao e sobre nos-->
  <!--CONTEUDO SOBRE LOCALIZACAO E SOBRE NOS-->
  <div class="container-fluid my-3">
    <div class="row mx-3">
      <div class="col embed-responsive embed-responsive-16by9" id="localização">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.639068759222!2d-44.99379412602629!3d-12.136829543581936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x75f8aac46ce85d3%3A0xd04192f3e2a1ae21!2sR.%20Padre%20Vieira%20-%20Vila%20Brasil%2C%20Barreiras%20-%20BA%2C%2047800-292!5e0!3m2!1spt-BR!2sbr!4v1717433671572!5m2!1spt-BR!2sbr" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
      <div class="col text-float fundo_background_dark p-4" style="background-color: #F0F0F0;">
        <h2>Sobre Nós!</h2>
        <p>Raccoon Imóveis é uma empresa inovadora no setor imobiliário, dedicada a oferecer experiências excepcionais na compra, venda e locação de imóveis. Nossa missão é transformar o mercado imobiliário com soluções personalizadas, buscando sempre a satisfação e confiança dos nossos clientes.</p>
        <p>Visão: Ser a principal referência no setor, destacando-se pela inovação, excelência no atendimento e compromisso com a qualidade.</p>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <ul>
              <h3>Valores:</h3>
              <li>Transparência</li>
              <li>Excelência</li>
              <li>Inovação</li>
              <li>Satisfação do Cliente</li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul>
              <h3>Serviços:</h3>
              <li>Compra e venda de imóveis</li>
              <li>Locação de imóveis</li>
              <li>Avaliação e consultoria imobiliária</li>
              <li>Gestão de propriedades</li>
            </ul>
          </div>
        </div>
        <hr>
        <p>Na Raccoon Imóveis, cada cliente é único e cada imóvel é uma nova oportunidade de realizar sonhos. Venha nos conhecer e descubra como podemos transformar sua experiência imobiliária!</p>
      </div>
    </div>
  </div>
  <!--FIM sobre nos-->


  <!--Inicio para corretores-->
  <?php include 'mensagemlogar/informacao_mensagem.php' ?>
  <section class="mb-5 zoom-effect " id="corretores">
    <br>
    <h4>Conheça nossos corretores!</h4>
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="2" space-between="30" free-mode="true">
      <?php include 'ADM_CRUD/corretores_mostrar.php' ?>
    </swiper-container>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
  <?php require 'conteudo/footer.php' ?>
  <script src="JS/botãoseleção.js"></script>
  <script src="JS/main.js"></script>
  <script src="JS/menu_script.js"></script>

</body>

</html>