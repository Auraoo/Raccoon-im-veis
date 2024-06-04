<?php
include './conexao/config.php';

$sql = "SELECT * FROM imoveis ";
$result = $conexao->query($sql);

if ($result->num_rows>0) {
    while ($rows=$result->fetch_assoc()) {
       $rows['imagem_principal'];
       $rows['titulo'];
       $rows['preco'];
       echo '
     <swiper-slide>
     <div class="card">
       <img src="'.$rows['imagem_principal'].'" class="card-img-top" alt="..." ; >
       <div class="card-body">
         <h5 class="card-title">'.$rows['titulo'].'</h5>
         <p class="card-text">Valor R$'.$rows['preco'].'</p>
       </div>
     </div> 
     
    </swiper-slide>';
    }
}
?>
!
