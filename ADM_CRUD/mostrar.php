<?php
require 'consulta_info.php'
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="table-widget sub-dark fundo_background_dark">
    <table id="Imoveis">
        <caption>
            Imóveis Cadastrados no BD
            <span class="table-row-count"></span>
        </caption>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Titulo</th>
                <th>Preço</th>
                <th>Endereço</th>
                <th>ID</th>
                <th>Corretor</th>
                <th>ADM</th>
            </tr>
        </thead>
        <tbody id="team-member-rows">
            <?php foreach ($imoveis as $imovel) : ?>
                <tr>
                    <td>
                        <?php if (!empty($imovel['imagens'])) : ?>
                            <img src="Raccoon-im-veis/<?php echo $imovel['imagem_principal']; ?>" alt="<?php echo $imovel['titulo']; ?>" width="50px">
                        <?php else : ?>
                            <img src="path/to/default-image.jpg" alt="Sem imagem">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo $imovel['titulo']; ?>
                    </td>
                    <td>
                        R$ <?php echo $imovel['preco']; ?>
                    </td>
                    <td>
                        <?php echo $imovel['endereco']; ?>
                    </td>
                    <td>
                        <?php echo $imovel['id']; ?>
                    </td>
                    <td>
                        <?php echo $imovel['nome_corretor']; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-pen"></i>
                        </button>
                        <form action="ADM_CRUD/excluir.php" method="post" style="display:inline;">
                            <input type="hidden" name="imovel_id" value="<?php echo $imovel['id']; ?>">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <ul class="pagination">
                        <!-- Paginação gerada onde irá jogar os outros dados caso passe de 4 linhas -->
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>