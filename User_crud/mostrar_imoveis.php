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
     <div class="card" style="width: 18rem;">
       <img src="'.$rows['imagem_principal'].'" class="card-img-top" alt="..." width="300px" >
       <div class="card-body">
         <h5 class="card-title">'.$rows['titulo'].'</h5>
         <p class="card-text">'.$rows['preco'].'</p>
       </div>
     </div> 
     
    </swiper-slide>';
    }
}



?>