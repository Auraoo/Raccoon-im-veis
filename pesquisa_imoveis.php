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
    <link rel="stylesheet" href="CSS/pesquisa_imovel.css">
    <!-- link do menu lateral -->
    <link rel="stylesheet" href="CSS/menu_style.css">


</head>

<body id="dark">
    <?php
    // Verificar se o usuário está logado e possui um tipo definido na sessão
    if (isset($_SESSION['cargo_de_usuario'])) {
        // Verificar o tipo de usuário
        if ($_SESSION['cargo_de_usuario'] == 1) {
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
    <div class="grid_pesquisa margincima">
        <aside class="sidebar-left">
            <form action="pesquisa_imoveis.php" method="GET" id="pesquisa_formulario">
                <!-- Filtro por Preço -->
                <div class="filter-section my-2">
                    <label class="filter-label mb-0" for="preco">Preço: <span id="priceValue">0</span></label>
                    <input type="range" id="priceRange" name="preco" min="0" max="1000000" step="100" oninput="updatePriceValue()">
                </div>

                <!-- Filtro por Quartos com Suíte -->
                <div class="filter-section my-2">
                    <label class="filter-label mb-0">Quartos com Suíte:</label>
                    <input type="checkbox" id="suiteYes" name="suite" value="yes"> Sim
                </div>

                <!-- Filtro por Mobiliado -->
                <div class="filter-section my-2">
                    <label class="filter-label mb-0">Mobiliado:</label>
                    <input type="radio" id="mobiliadosim" name="mobiliado" value="sim"> Sim
                    <input type="radio" id="mobiliadonao" name="mobiliado" value="nao"> Não
                </div><br>

                <button class="button_filtro" type="submit">Pesquisar</button>
            </form>
        </aside>
        <main>
            <div class="imovel-container">
                <table id="Imoveis">
                    <tbody id="team-member-rows">

                        <?php
                        if ($result->num_rows > 0) {
                            // Exibir resultados
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<div class='imovel-card my-2'>";
                                echo "<a class='link-desabilitar' href='imovel.php?id=" . $row['id'] . "'>";
                                echo '<div class="imovel-content">';
                                echo '<img src="Raccoon-im-veis/' . $row["imagem_principal"] . '" class="imovel-imagem"> ';
                                echo '<div class="imovel-info">';
                                echo "<h3>" . $row['titulo'] . "</h3>";
                                echo "<p class='endereco_tf'>" . $row['endereco'] . "</p>";
                                echo "<div class='d-flex'>";
                                echo "<p class='mr-auto mb-0' >" . $row['tipo'] . "</p>";
                                echo "<p class='preco'>Preço: R$" . $row['preco'] . "</p>";
                                echo "</div>";
                                echo "</div>"; // .imovel-info
                                echo "</div>"; // .imovel-content
                                echo "</a>";
                                echo "</div>";
                                echo " </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Nenhum produto encontrado.</p>";
                        }

                        // Fechar conexão
                        $conexao->close();
                        ?>




                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <ul class="pagination mt-2 text-end">
                                    <!-- Paginação gerada onde irá jogar os outros dados caso passe de 4 linhas -->
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </main>
    </div>
    <div id="profileFrame" class="frame" >
        <!-- Aqui será carregado o conteúdo via Ajax -->
    </div>
    <?php include "conteudo/footer.php" ?>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => { // Espera o DOM carregar completamente antes de executar
            const itemsOnPage = 4; // Define o número de itens por página
            const teamMemberRows = document.getElementById('team-member-rows').getElementsByTagName('tr'); // Obtém todas as linhas de imóveis
            const totalItems = teamMemberRows.length; // Calcula o número total de itens
            const numberOfPages = Math.ceil(totalItems / itemsOnPage); // Calcula o número total de páginas

            let start = new URLSearchParams(window.location.search).get('page') || 1; // Obtém o parâmetro 'page' da URL ou define como 1
            start = parseInt(start); // Converte o valor da página inicial para um número inteiro

            const paginate = (pageNumber) => { // Função para paginar os itens
                const startItem = (pageNumber - 1) * itemsOnPage; // Calcula o item inicial para a página atual
                const endItem = startItem + itemsOnPage; // Calcula o item final para a página atual

                Array.from(teamMemberRows).forEach((row, index) => { // Loop através das linhas de imóveis
                    row.style.display = (index >= startItem && index < endItem) ? 'table-row' : 'none'; // Mostra ou esconde a linha com base no intervalo da página atual
                });
            };

            paginate(start); // Pagina os itens na página inicial

            const pagination = document.querySelector('.pagination'); // Obtém o elemento de paginação
            const linkList = []; // Cria uma lista para os links de paginação

            for (let i = 0; i < numberOfPages; i++) { // Loop para criar os links de paginação
                const pageNumber = i + 1; // Define o número da página
                linkList.push(`<li><a href="?page=${pageNumber}" ${pageNumber == start ? 'class="active"' : ''} title="page ${pageNumber}">${pageNumber}</a></li>`); // Adiciona o link de paginação à lista
            }

            pagination.innerHTML = linkList.join(''); // Adiciona os links de paginação ao HTML

            pagination.addEventListener('click', (event) => { // Adiciona um ouvinte de evento para os links de paginação
                if (event.target.tagName === 'A') { // Verifica se o elemento clicado é um link
                    event.preventDefault(); // Previne o comportamento padrão do link
                    const page = parseInt(event.target.textContent); // Obtém o número da página clicada

                    // Preservar os parâmetros da query string existentes
                    const params = new URLSearchParams(window.location.search); // Cria uma instância de URLSearchParams com a query string atual
                    params.set('page', page); // Define ou atualiza o parâmetro 'page'

                    window.location.href = `?${params.toString()}`; // Atualiza a URL com os parâmetros preservados e o novo número de página
                }
            });
        });

        function updatePriceValue() { // Função para atualizar o valor do preço exibido
            var priceRange = document.getElementById('priceRange'); // Obtém o elemento de input do range de preço
            var priceValue = document.getElementById('priceValue'); // Obtém o elemento de exibição do valor do preço
            priceValue.textContent = priceRange.value; // Atualiza o valor do preço exibido com o valor atual do range
        }

        // retiração
        function updatePriceValue() {
            var priceRange = document.getElementById('priceRange');
            var priceValue = document.getElementById('priceValue');
            priceValue.textContent = priceRange.value;
        }
    </script>
    <script src="JS/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="JS/menu_script.js"></script>
</body>

</html>