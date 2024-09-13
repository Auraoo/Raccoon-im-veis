<?php
include './conexao/config.php';

$sql = "SELECT * FROM imoveis ";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
  while ($rows = $result->fetch_assoc()) {
    $rows['imagem_principal'];
    $rows['titulo'];
    $rows['preco'];
    $rows['id'];
    echo '
     <swiper-slide>
     <a class="link-desabilitar" href="imovel.php?id='. $rows["id"] .'">
     <div class="card fundo_background_dark">
       <img src="' . $rows['imagem_principal'] . '" class="card-img-top" alt="..." ; >
       <div class="card-body">
         <h5 class="card-title letras_color_dark">' . $rows['titulo'] . '</h5>
         <div class=" mt-3" >
         <p class="card-text letras_color_dark preco mt-auto" id="precocolor_temadark">Valor R$' . $rows['preco'] . '</p>
         </div>
       </div>
     </div> 
     </a>
     
    </swiper-slide>';
  }
}
?>
