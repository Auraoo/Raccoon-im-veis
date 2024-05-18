<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raccoon Imóveis</title>
    <link rel="stylesheet" href="CSS/style.css">
    <!-- link css bootstratp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <!-- link dos icons do site -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



</head>
<body id="dark">

<?php
// Verificar se o usuário está logado e possui um tipo definido na sessão
if(isset($_SESSION['cargo_de_usuario'])) {
    // Verificar o tipo de usuário
    if($_SESSION['cargo_de_usuario'] == 1) {
        // Tipo de usuário é 1, mostrar o cabeçalho de um jeito
        include_once 'conteudo/header_adm.php';  // header para o cargo tipo 1 (adm)
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
  
    <!--SECTION CONTEUDO-->
    <main>
        
       <?php include 'mensagemlogar/informacao_mensagem.php' ?>
        
          <div class="b-example-divider"></div>
          
          <div class="container col-xxl-8 px-4 py-5" id="dark">
              <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6 zoom-effect">
                  <img src="./assets/imagem contrato.webp" class="d-block mx-lg-auto img-fluid" alt="Imagen contrato" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                  <h1 class="display-5 fw-bold  lh-1 mb-3">Não perca tempo!</h1>
                  <p class="lead">"Descubra o conforto e a conveniência do aluguel de casas com a Raccoon Imóveis. Oferecemos uma variedade de opções de residências, desde casas acolhedoras até espaçosas, para atender às suas necessidades. Conte com nossa equipe para encontrar o lar perfeito para você, tornando sua experiência de aluguel simples e satisfatória. Entre em contato agora para começar a sua busca!"
                  </p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 mr-2">E-mail</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contato!</button>
                  </div>
                </div>
              </div>
            </div>
  
    </main>

   
    <script src="JS/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>