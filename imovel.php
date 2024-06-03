<?php include 'User_crud/imovel_mostrar.php';
$mostrarModal = false;

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    $mostrarModal = true;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $imovel['titulo']; ?> </title>
  <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">
  <link rel="stylesheet" href="CSS/imovel_p.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
  <link rel="stylesheet" href="CSS/menu_style.css">
  <link rel="stylesheet" href="CSS/mensagem_logar.css">
</head>
<body id="dark">
  <?php
  // adicionando o header dependendo do tipo de usuário
  if (isset($_SESSION['cargo_de_usuario'])) {
    if ($_SESSION['cargo_de_usuario'] == 1) {
      require 'conteudo/header_adm.php';
    } else {
      include 'conteudo/header_.php';
    }
  } else {
    include 'conteudo/header.php';
  }
  include 'mensagemlogar/informacao_mensagem.php';
  ?>
      <div id="profileFrame" class="frame" >
        <!-- Aqui será carregado o conteúdo via Ajax -->
    </div>
  <div class="container">
    <div class="info_foto">
      <div class="info_site_nome">
        <h2 class="font_seria mt-2"><?php echo $imovel['titulo']; ?></h2>
        <p class="mb-0 mt-4">Cidade: <?php echo $imovel['cidade']; ?></p>
        <p class="mb-0">bairro: <?php echo $imovel['bairro']; ?></p>
        <p class="mb-0">Endereço: <?php echo $imovel['endereco_imovel']; ?></p>
        <p class="mb-0">Disponibilidade: <?php echo $imovel['disponibilidade']; ?></p>
        <div class="preço_imovel mt-4">
          <p class="mb-0">R$<?php echo $imovel['preco']; ?>,00</p>
        </div>
        <div class="d-flex mb-4 mt-2">
          <button type="button"  onclick="checkLogin()" id="btncolor" class="btn btn-lg px-4 mr-2">
            <a href="#" style="text-decoration: none;">
              <span class="spanbtn">Negociar</span>
              <div class="overlay"></div>
            </a>
          </button>
          <button type="button"  onclick="checkLogin()" id="btncolor" class="btn btn-lg px-4 mr-2">
            <a href="#" style="text-decoration: none;">
              <span class="spanbtn">Financiamento</span>
              <div class="overlay"></div>
            </a>
          </button>
        </div>

      </div>
      <div class="imagem_informaçãoprincipal">
        <div class="imagemfundo">
          <!-- colocando style por que o background da div é a imagem que tá no bd -->
          <style>
            .imagemfundo {
              margin-top: 3px;
              background-image: url("Raccoon-im-veis/<?php echo $imovel['imagem_principal']; ?>");
              /*imagem que ta no bd e só funciona aqui*/
              width: 100%;
              height: 100%;
              background-size: cover;
              /* Ajusta o tamanho da imagem para cobrir toda a div */
              background-position: center;
              /* Centraliza a imagem */
              background-repeat: no-repeat;
              /* Evita a repetição da imagem */
              display: flex;
              align-items: end;
              justify-content: end;
              text-align: center;
              border-radius: 50% 50% 0 0;
            }

            .imagem_container {
              background-color: #e6e6e6;

            }
          </style>
        </div>
      </div>

    </div>

  </div>

  <div class="imagem_container">
    <div class="container pt-2">
      <div class="gallery">
        <?php
        // Exibir imagens adicionais
        if ($result_imagens->num_rows > 0) {
          while ($imagem = $result_imagens->fetch_assoc()) {
            echo '<figure class="image-container">';
            echo "<img src='Raccoon-im-veis/" . $imagem['path'] . "' width='270px' class='image'>";
            echo '</figure>';
          }
        } else {
          echo "Nenhuma imagem adicional encontrada.";
        }
        ?>

      </div>
    </div>
  </div>
  <div class="container">
    <table class="mt-5">
      <thead>
        <tr>
          <th colspan="3">
            <h3 class="font_seria2">Especificações do Imovel</h3>
          </th>

        </tr>
      </thead>
      <!-- especificações a mais do imoveis  -->
      <tbody>
        <tr>
          <td>Quartos imovel</td>
          <td><?php echo $imovel['quartos']; ?></td>

        </tr>
        <tr>
          <td>Garagem imovel</td>
          <td><?php echo $imovel['garagem']; ?></td>

        </tr>
        <tr>
          <td>Area Construida imovel</td>
          <td><?php echo $imovel['area_contruida']; ?></td>

        </tr>
        <tr>
          <td>Banheiro imovel:</td>
          <td><?php echo $imovel['banheiro']; ?></td>

        </tr>
        <tr>
          <td>Finalidadel</td>
          <td><?php echo $imovel['finalidade']; ?></td>

        </tr>
        <tr>

          <td>Tipo</td>
          <td><?php echo $imovel['tipo']; ?></td>

        </tr>
      </tbody>
    </table>
  </div>
  <div class="container mt-5">
    <h3 class="font_seria2">Corretor responsavél</h3>
    <article class="card_corretor">
      <div class='background'>
        <img src="Raccoon-im-veis/<?php echo $imovel['foto_corretor']; ?>" alt="profile">
      </div>
      <div class='content  bg-dark'>
        <h2> <?php echo $imovel['nome_emp']; ?></h2>
        <p>informações de contato:</p>
        <ul class="chips">
          <li class="chip"><i class="fas fa-envelope"></i> <?php echo $imovel['email_emp']; ?></li>
          <li class="chip"><i class="fab fa-whatsapp"></i> <?php echo $imovel['telefone_emp']; ?></li>
        </ul>
        <p class="p-3 bg_biografia"><?php echo $imovel['biografia_emp']; ?></p>
      </div>
      <div class="corretora_info">
        
        <div class="container p-2">
          <span class="mx-1 ">Corretora</span>
          <h1><?php echo $imovel['nome']; ?></h1>
          <p>Endereço corretora:<br> <?php echo $imovel['corretora_endereco']; ?></p>
          <p>telefone corretora:<br> <?php echo $imovel['telefone']; ?></p>
        </div>
      </div>
    </article>
  </div>
  <div class="container my-5">
    <div class="descricao_extra">
      <fieldset>
        <legend class="font_seria2">Descrição</legend>
        <p><?php echo $imovel['descricao']; ?></p>

      </fieldset>
    </div>
  </div>
  <?php require "conteudo/footer.php"; ?>
</body>
<script src="JS/menu_script.js"></script>
</html>