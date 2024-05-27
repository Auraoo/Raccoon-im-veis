<?php
include_once 'conexao/config.php';
session_start();

// Verifica se o ID do produto foi passado na URL
if (!isset($_GET['id'])) {
    die('ID do produto informado');
}

// Prevenir SQL Injection
$id = $conexao->real_escape_string($_GET['id']);

// consultando todos as tabelas e informações que envolve o "imovel"
$sql = "SELECT * ,imoveis.endereco AS endereco_imovel,corretora.endereco AS corretora_endereco
FROM imoveis
join imagens on imagens.imoveis_id = imoveis.id
join especificacao e on imoveis.id_especificacao = e.id
join corretor_emp on imoveis.id_corretor = corretor_emp.id_emp 
join corretora on corretor_emp.id_corretora = corretora.id  WHERE imoveis.id = '$id'";
$result = $conexao->query($sql);

//dando um cheack pra ver se deu certo a consulta
if ($result === false) {
    die("Erro na consulta SQL: " . $conexao->error);
}

// Verificar se o produto foi encontrado
if ($result->num_rows == 0) {
    die("Produto não encontrado.");
}

// Obter os dados e jogando na variavel imovel
$imovel = $result->fetch_assoc();

// Consulta para obter as imagens adicionais
$sql_imagens = "SELECT path FROM imagens WHERE imoveis_id = '$id'";
$result_imagens = $conexao->query($sql_imagens);

if ($result_imagens === false) {
    die("Erro na consulta SQL das imagens: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $imovel['titulo']; ?> </title>
    <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700;900&display=swap");

img {
  max-width: 100%;
}
.gallery-wrapper{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;

   
}

.gallery {
   width:90% /*min(100vw, 1440px)*/; 
  display: flex;
  flex-direction: column;
  padding-inline: 2rem;
  padding-block: 1rem;
  row-gap: 1rem;

  & .image-container {
    flex: 1;
    width: 100%;
    height: 550px;
    transition: flex 0.5s ease-in;

    @media only screen and (width > 480px) {
      &:hover {
        flex: 5;
      }
    }

    & .image {
      height: 100%;
      width: 100%;
      object-fit: cover;
      object-position: center;
    }
  }

  @media screen and (width > 480px) {
    flex-direction: row;

    & .image-container {
      width: calc(100% / 5);
    }
  }
}
  </style>
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
?>
    <div class="produto-detalhes mt-5">
        <h1><?php echo $imovel['titulo']; ?></h1>
        <p>descrição:<?php echo $imovel['descricao']; ?></p>
        <p>Cidade: <?php echo $imovel['cidade']; ?></p>
        <p>bairro: <?php echo $imovel['bairro']; ?></p>
        <p>Endereço: <?php echo $imovel['endereco_imovel']; ?></p>
        <p>Preço: R$<?php echo $imovel['preco']; ?></p>
        <img src="Raccoon-im-veis/<?php echo $imovel['imagem_principal']; ?>" width="270px">
        <p>Disponibilidade: <?php echo $imovel['disponibilidade']; ?></p>
        <p>tipo: <?php echo $imovel['tipo']; ?></p>
        <p>finalidade: <?php echo $imovel['finalidade']; ?></p>

        <hr>
        <div class="gallery-wrapper">
      <h1 class="header">Imagem do imovel</h1>
      <div class="gallery">
        <!-- <figure class="image-container">
          <img src="./images/img-1.jpg" alt="Image 01" class="image" />
        </figure> -->
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

        <hr>

        <!-- especificações a mais do imoveis  -->
        <p>quartos imovel: <?php echo $imovel['quartos']; ?></p>
        <p>garagem imovel: <?php echo $imovel['garagem']; ?></p>
        <p>Area Construida imovel: <?php echo $imovel['area_contruida']; ?></p>
        <p>banheiro imovel: <?php echo $imovel['banheiro']; ?></p>

        <hr>
        <!-- corretor dados -->
        <img src="Raccoon-im-veis/<?php echo $imovel['foto_corretor']; ?>" width="270px">
        <p>nome correror: <?php echo $imovel['nome_emp']; ?></p>
        <p>email correror: <?php echo $imovel['email_emp']; ?></p>
        <p>telefone correror: <?php echo $imovel['telefone_emp']; ?></p>
        <p>biografia correror: <?php echo $imovel['biografia_emp']; ?></p>
        <hr>

        <!-- dados da corretora -->
        <p>nome corretora: <?php echo $imovel['nome']; ?></p>
        <p>Endereço corretora: <?php echo $imovel['corretora_endereco']; ?></p>
        <p>telefone corretora: <?php echo $imovel['telefone']; ?></p>














    </div>
<?php include "conteudo/footer.php"; ?>
</body>
</html>
