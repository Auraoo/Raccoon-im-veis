<?php
require 'consulta_info.php'
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="table-widget">
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

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="ADM_CRUD/alterar.php" method="post">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">ALteração de Dados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Campo oculto para enviar o ID do imóvel -->
                                            <label for="id">Id do Imovel</label><br>
                                            <input type="number" id="id" name="imovel_id" required><br><br>

                                            <!-- Campo de título -->
                                            <label for="titulo">Título:</label><br>
                                            <input type="text" id="titulo" name="titulo"><br><br>

                                            <!-- campo para o tipo de cidade -->
                                            <label for="Cidade">Cidade</label><br>
                                            <input type="text" id="Cidade" name="cidade"><br><br>

                                            <!-- campo do tipo de Bairro -->
                                            <label for="Bairro">Bairro</label><br>
                                            <input type="text" id="Bairro" name="bairro" placeholder="Bairro:"><br><br>

                                            <!-- campo do tipo de imovel -->
                                            <label for="tipo_imovel">Tipo de Imovel</label><br>
                                            <input type="text" id="tipo_imovel" name="tipo_imovel" placeholder="ex: casa, Apartamento, salão etc.."><br><br>

                                            <!-- Campo de endereço -->
                                            <label for="endereco">Endereço:</label><br>
                                            <input type="text" id="endereco" name="endereco"><br><br>

                                            <!-- Campo de preço -->
                                            <label for="preco">Preço:</label><br>
                                            <input type="text" id="preco" name="preco"><br><br>

                                            <!-- Campo de do id do corretor -->
                                            <label for="corretor">Id corretor</label><br>
                                            <input type="number" id="corretor" name="corretor"><br><br>

                                            <!-- disponibilidade do imovel -->
                                            <div class="form-group">
                                                <h5>Disponibilidade</h5>

                                                <input type="radio" name="disponibilidade" id="disponivel" value="Disponivel">
                                                <label for="disponivel">Disponivel</label>
                                                <input type="radio" name="disponibilidade" id="indisponivel" value="Indisponivel">
                                                <label for="indisponivel">Indisponivel</label>
                                            </div><br>

                                            <!-- Campo de descrição -->
                                            <label for="descricao">Descrição: </label><br>
                                            <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" value="Alterar">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


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