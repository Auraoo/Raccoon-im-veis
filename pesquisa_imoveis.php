<?php
include_once 'conexao/config.php';
session_start();

// Obter a consulta de pesquisa
$query = isset($_GET['query']) ? $_GET['query'] : '';
$garagem = isset($_GET['garagem']) ? $_GET['garagem'] : '';
$bairro = isset($_GET['bairro']) ? $_GET['bairro'] : ''; // Novo filtro para exemplo

// Prevenir SQL Injection
$query = $conexao->real_escape_string($query);
$garagem = $conexao->real_escape_string($garagem);
$bairro = $conexao->real_escape_string($bairro);

// Consultar o banco de dados
$sql = "SELECT imoveis.*, especificacao.garagem FROM imoveis 
JOIN especificacao ON imoveis.id_especificacao = especificacao.id 
WHERE imoveis.titulo LIKE '%$query%'";

if ($garagem === 'sim') {
    $sql .= " AND especificacao.garagem = 'Sim'";
} elseif ($garagem === 'nao') {
    $sql .= " AND especificacao.garagem = 'Nao'";
}

if (!empty($bairro)) {
    $sql .= " AND imoveis.bairro = '$bairro'";
}

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
    <title>Raccoon Imóveis</title>
    <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/pesquisa_imovel.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/menu_style.css">
</head>

<body id="dark">
    <?php
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
    <div class="grid_pesquisa margincima">
        <aside class="sidebar-left">
            <form action="User_crud/select_pesquisa.php" method="GET" id="pesquisa_formulario">
                <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
                <div class="filter-section my-2">
                    <label class="filter-label mb-0"  for="bairro">Bairro:</labe>
                    <select class="form-control" name="bairro" id="bairro">
                        <option value=""  disabled selected>Selecione um Bairro</option>
                        <option value="Barreiras">Barreiras</option>
                        <option value="Morada Nobre">Morada Nobre</option>
                        <option value="Vila Regina">Vila Regina</option>
                        <option value="Jardim Ouro Branco">Jardim Ouro Branco</option>
                        <option value="Bandeirantes">Bandeirantes</option>
                        <option value="Morada da Lua">Morada da Lua</option>
                    </select>
                </div>
                <div class="filter-section my-2">
                    <label class="filter-label mb-0">Garagem</label>
                    <input type="radio" id="garagemsim" name="garagem" value="sim">
                    <label for="garagemsim">Sim</label>
                    <input type="radio" id="garagemnao" name="garagem" value="nao">
                    <label for="garagemnao">Não</label>
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
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<div class='imovel-card fundo_background_dark my-2'>";
                                echo "<a class='link-desabilitar' href='imovel.php?id=" . $row['id'] . "'>";
                                echo '<div class="imovel-content">';
                                echo '<img src="Raccoon-im-veis/' . $row["imagem_principal"] . '" class="imovel-imagem">';
                                echo '<div class="imovel-info">';
                                echo "<h3>" . $row['titulo'] . "</h3>";
                                echo "<p class='endereco_tf'>" . $row['endereco'] . "</p>";
                                echo "<div class='d-flex'>";
                                echo "<p class='mr-auto mb-0'>" . $row['tipo'] . "</p>";
                                echo "<p class='preco' id='precocolor_temadark'>Preço: R$" . $row['preco'] . "</p>";
                                echo "</div>";
                                echo "</div>"; // .imovel-info
                                echo "</div>"; // .imovel-content
                                echo "</a>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Nenhum produto encontrado.</p>";
                        }
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
    <div id="profileFrame" class="frame fundo_background_dark">
        <!-- Aqui será carregado o conteúdo via Ajax -->
    </div>
    <?php include "conteudo/footer.php" ?>
    <script src="JS/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="JS/menu_script.js"></script>
    <script src="JS/botãoseleção.js"></script>
    <script src="JS/pesquisa_tela.js"></script>
</body>

</html>