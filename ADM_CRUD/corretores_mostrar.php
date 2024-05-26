<?php 
include '/xampp/htdocs/Raccoon-im-veis/conexao/config.php';

$sql = "SELECT cp.id_emp, cp.foto_corretor, cp.nome_emp, cp.email_emp,cp.telefone,cp.biografia, c.nome AS corretora_nome 
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
        $row['telefone'];
        $row['biografia'];
        $row['corretora_nome'];
         echo ' 
        <swiper-slide>
        <div class="container">
        <div class="row info-container">
            <div class="col-md-4">
                <img src="Raccon-im-veis/'.$row['foto_corretor'].'" alt="Imagem Exemplo">
            </div>
            <div class="col-md-8 info">
                <h2>'.$row['nome_emp'].'</h2>
                <p>Email: '.$row['email_emp'].'</p>
                <p>'.$row['telefone'].'</p>
                <p>'.$row['biografia'].'</p>
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
