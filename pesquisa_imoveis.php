<?php
include_once 'conexao/config.php';
// Conectaa com banco o BD
session_start();

// Obter a consulta de pesquisa
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prevenir SQL Injection
$query = $conexao->real_escape_string($query);

// estrutura do filtro do professor icaro \|/

// $sql = "SELECT * FROM imoveis WHERE tipo = '$tipo' 
// OR finalidade = '$finalidade' OR cidade = '$cidade'
// OR bairro = '$bairro' OR quarto = '$quarto' 
// OR banheiro = '$banheiro'";

// Consultar o banco de dados
$sql = "SELECT * FROM imoveis WHERE titulo LIKE '%$query%'";
$result = $conexao->query($sql);

// Verificar se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na consulta SQL: " . $conexao->error);
}

// Se a consulta não retornar resultados, buscar todos os produtos
if ($result->num_rows == 0) {
    $sql = "SELECT * FROM imoveis";
    $result = $conexao->query($sql);
    
    if ($result === false) {
        die("Erro na consulta SQL: " . $conexao->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/Raccon-im-veis/CSS/style.css">

    <link rel="stylesheet" href="Raccon-im-veis/CSS/style.css">
<link rel="stylesheet" href="Raccon-im-veis/CSS/style.css">
<!-- link css bootstratp -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<!-- link dos icons do site -->

</head>
<style>
body {
    height: 600px;
}
main {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
    overflow: auto;
}
.margincima {
    margin-top: 250px;
}
.layout {
    display: grid;
    gap: 4px;
    grid-template-rows: 40px 40px auto 60px 60px 40px;
    grid-template-columns: 1fr;
    grid-template-areas: 'sidebar' 'main';
    height: 100vh;
}
.grid {
    display: grid;
    grid-template-rows: auto 5rem;
    grid-template-columns: 250px auto;
    font-size: 1.5rem;
    height: 100%;
}
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    aside {
        grid-row: 1;
    }
    main {
        grid-column: 1 / -1;
    }
}
@media (max-width: 532px) {
    .imovel-content {
        flex-direction: column;
        align-items: center;
    }
    .imovel-imagem {
        max-width: 100%;
        margin: 0 0 16px 0;
    }
    .imovel-info {
        text-align: center;
    }
}
aside, main {
    display: flex;
    justify-content: center;
    align-items: center;
}
.link-desabilitar, .link-desabilitar:hover {
    color: inherit;
    text-decoration: none;
}
.endrereco_tf {
    font-size: small;
}
.imovel-card .preco {
    font-size: 24px;
    color: green;
    margin: 10px 0;
}
.imovel-container {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}
.imovel-card {
    border: 1px solid;
    box-sizing: border-box;
    text-align: left;
    width: 100%;
    border-radius: 5px;
    text-align: center;
    padding: 20px;
    background-color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-color: green;
}
.imovel-card:hover {
    transform: translateY(-0.1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.imovel-content {
    display: flex;
    align-items: flex-start;
}
.imovel-imagem {
    max-width: 200px;
    margin-right: 16px;
}
.imovel-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.imovel-card h2 {
    font-size: 1.5em;
    margin: 0 0 8px 0;
    text-align: start;
}
.imovel-card .endereco_tf,
.imovel-card .preco {
    margin: 4px 0;
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
    <h1 class="margincima" >Resultados da Pesquisa</h1>
    <div class="grid">
        <aside class="sidebar-left">
            <form action="pesquisa_imoveis.php" method="GET" id="searchForm">
                <!-- Filtro por Preço -->
                <div class="filter-section">
                    <label for="preco">Preço: <span id="priceValue">0</span></label><br>
                    <input type="range" id="priceRange" name="preco" min="0" max="1000000" step="100" oninput="updatePriceValue()">
                </div><br>

                <!-- Filtro por Quartos com Suíte -->
                <div class="filter-section">
                    <label class="filter-label">Quartos com Suíte:</label><br>
                    <input type="checkbox" id="suiteYes" name="suite" value="yes"> Sim
                </div><br>

                <!-- Filtro por Mobiliado -->
                <div class="filter-section">
                    <label class="filter-label">Mobiliado:</label><br>
                    <input type="radio" id="furnishedYes" name="furnished" value="yes"> Sim
                    <input type="radio" id="furnishedNo" name="furnished" value="no"> Não
                </div><br>

                <button type="submit">Pesquisar</button>
            </form>
        </aside>
        <main>
        <div class="imovel-container">
                
            <?php
                if ($result->num_rows > 0) {
                    // Exibir resultados
                 while($row = $result->fetch_assoc()) {
                    echo "<div class='imovel-card'>";
                    echo "<a class='link-desabilitar' href='imovel.php?id=" . $row['id'] . "'>";
                    echo '<div class="imovel-content">';
                    echo '<img src="Raccoon-im-veis/' . $row["imagem_principal"] . '" class="imovel-imagem"> ';
                    echo '<div class="imovel-info">';
                    echo "<h2>" . $row['titulo'] . "</h2>";
                    echo "<p class='endereco_tf'>endereço: " . $row['endereco'] . "</p>";
                    echo "<p class='preco'>Preço: R$" . $row['preco'] . "</p>";
                    echo "<p>tipo:" . $row['tipo'] . "</p>";
                    echo "</div>"; // .imovel-info
                    echo "</div>"; // .imovel-content
                    echo "</a>";
                    echo "</div>";
                        
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }

                // Fechar conexão
                $conexao->close();
            ?>

</div>
        </main>
    </div>
           
<img src="" width="" alt="" srcset="">



<img src="" alt="">
    
<?php include "conteudo/footer.php" ?>   
    <script>
        function updatePriceValue() {
            var priceRange = document.getElementById('priceRange');
            var priceValue = document.getElementById('priceValue');
            priceValue.textContent = priceRange.value;
        }
    </script>
    <script src="JS/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</body>
</html>
