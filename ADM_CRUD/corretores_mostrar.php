<?php 
include '/xampp/htdocs/Raccoon-im-veis/conexao/config.php';
//consulta para pegar os dados do 
$sql = "SELECT cp.id_emp, cp.foto_corretor, cp.nome_emp, cp.email_emp,cp.telefone_emp,cp.biografia_emp, c.nome AS corretora_nome 
FROM corretor_emp cp
join corretora c on cp.id_corretora = c.id";
$result = $conexao->query($sql);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Iterar sobre os resultados e exibi-los
    while($row = $result->fetch_assoc()) {
        $row['id_emp'];
        $row['nome_emp'];
        $row['email_emp'];
        $row['foto_corretor'];
        $row['telefone_emp'];
        $row['biografia_emp'];
        $row['corretora_nome'];
         
        echo ' 
        <swiper-slide>
        <div class="container p-2">
        <div class="row info-container fundo_background_dark corretor_background_div">
             
            <div class="col-md-4" >
                <img src="Raccon-im-veis/'.$row['foto_corretor'].'" alt="Imagem Exemplo"  style="height: 190px">
            </div>
            <div class="col-md-8 info fundo_background_dark corretor_background_info">

                <h4 class="corretor_nome letras_color_dark">'.$row['nome_emp'].'</h4>
                <p class="corretor_email text-responsive letras_color_dark ">Email: '.$row['email_emp'].'</p>
                
                <div>
                <p class="corretor_email text-responsive letras_color_dark "> Corretora: '.$row['corretora_nome'].'</p>

                <p class="corretor_telefone text-responsive letras_color_dark ">  Telefone:'.$row['telefone_emp'].'</p>
                </div>

                <p class="corretor_biografia">'.$row['biografia_emp'].'</p>
            </div>
        </div>
    </div>

    </swiper-slide>';
    }
} else {
    echo "0 resultados";
}

// Fechar a conexão
$conexao->close();
?>
