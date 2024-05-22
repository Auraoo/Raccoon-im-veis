<?php
include_once 'conexao/config.php';
// Conectaa com banco o BD
session_start();

// Obter a consulta de pesquisa
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prevenir SQL Injection
$query = $conexao->real_escape_string($query);

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

<link rel="stylesheet" href="Raccon-im-veis/CSS/style.css">
<!-- link css bootstratp -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<!-- link dos icons do site -->

</head>
<style>
    
    body{

        height: 600px;
    }
    .margincima{
        margin-top: 250px;
    }
    .layout{
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
    grid-template-columns: 250px auto; /* Definindo o tamanho fixo do aside */
    font-size: 1.5rem;
    height: 100%;
}

@media (max-width: 480px) {
    .grid {
        grid-template-rows:
            auto 6rem;
        grid-template-columns: 1fr;
    }

    main {
        grid-column: 1 / 2;
    }
}

aside,
main {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
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
            <form action="search.php" method="GET" id="searchForm">
                <!-- Filtro por Preço -->
                <div class="filter-section">
                    <label for="priceRange">Preço: <span id="priceValue">0</span></label><br>
                    <input type="range" id="priceRange" name="priceRange" min="0" max="10000" step="100" oninput="updatePriceValue()">
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
            <?php
                if ($result->num_rows > 0) {
                    // Exibir resultados
                    while($row = $result->fetch_assoc()) {
                        echo "<div>";
                        echo "<h2>" . $row['titulo'] . "</h2>";
                        echo "<p>" . $row['descricao'] . "</p>";
                        echo "<p>endereço: ". $row['endereco'] . "</p>";
                        echo "<p>Preço: R$" . $row['preco'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }

                // Fechar conexão
                $conexao->close();
            ?>
        </main>
    </div>
           
           





    
       
    <script>
        function updatePriceValue() {
            var priceRange = document.getElementById('priceRange');
            var priceValue = document.getElementById('priceValue');
            priceValue.textContent = priceRange.value;
        }
    </script>
    <script src="JS/main.js"></script>

</body>
</html>
