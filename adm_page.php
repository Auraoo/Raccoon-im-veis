<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Imóveis</title>
    <link rel="shortcut icon" href="assets/guaxinim-sem-fundo.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="CSS/ADM_page.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/menu_style.css">


</head>

<body>
    <?php include 'conteudo/header_adm.php' ?>
    <!-- Formulário de cadastro -->
    <style>
        #formularios_cadastro {
            display: none;
            /* Inicialmente escondida */

        }

        #esconder_formularios {
            margin-top: 80px;
        }
    </style>
    <div id="profileFrame" class="frame">
        <!-- Aqui será carregado o conteúdo via Ajax -->
    </div>
    <button id="esconder_formularios">Formularios de cadastro</button>

    <div class="container mt-4 pt-2 bg-white" id="formularios_cadastro">

        <!-- Abas para alternar entre Pessoa Física e Pessoa Jurídica -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" style="text-decoration: none;" id="imovelcadastro-tab" data-toggle="tab" href="#cadastro_imovel" role="tab" aria-controls="pessoaFisica" aria-selected="true" data-tipo="1">Cadastro de Imovel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="text-decoration: none;" id="pessoaJuridica-tab" data-toggle="tab" href="#pessoaJuridica" role="tab" aria-controls="pessoaJuridica" aria-selected="false" data-tipo="2">Cadastro de Corretor</a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <!-- Formulário de Pessoa Física id="propertyForm" -->
            <div class="tab-pane fade show active " id="cadastro_imovel" role="tabpanel" aria-labelledby="imovelcadastro-tab">
                <div class="shadow-box">
                    <h4>Cadastro de Imóveis</h4>
                    <form id="cadastro_imovel" action="ADM_CRUD/inserir_imovel.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="imagemdefault">Imagem Principal</label>
                            <input type="file" id="imagemdefault" name="imagemdefault" accept="image/*" placeholder="Imagem Pricipal">
                        </div>

                        <div class="form-group">
                            <label for="images[]">Imagem secundarias</label>
                            <input type="file" id="images" name="images[]" accept="image/*" placeholder="Imagens" multiple required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="titulo" name="titulo" placeholder="Titulo" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="Cidade" name="cidade" placeholder="Cidade:" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="Bairro" name="bairro" placeholder="Bairro:" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="preco" name="preco" placeholder="preço" required>
                        </div>
                        <div class="form-group">
                            <input type="number" id="corretorid" name="corretorid" placeholder="id_corretor" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="tipo_imovel" name="tipo_imovel" placeholder="Tipo de imóvel (ex: casa, Apartamento, salão etc..)" required>
                        </div>
                        <div class="form-group">
                            <input type="number" id="quartos" name="quartos" placeholder="Quantos quartos?" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="area_contruida" name="area_construida" placeholder="medidas da Area Construida" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="banheiro" name="banheiro" placeholder="Possui banheiro? quantos?" required>
                        </div>
                        <div class="form-group">
                            <h5>Finalidade</h5>

                            <input type="radio" name="finalidade" id="residencial" value="residencial">
                            <label for="residencial">Residencial</label>
                            <input type="radio" name="finalidade" id="comercial" value="comercial">
                            <label for="comercial">Comercial</label>
                        </div>
                        <div class="form-group">
                            <h5>Garagem</h5>

                            <input type="radio" name="garagem" id="garagem1" value="Sim">
                            <label for="garagem1">sim</label>
                            <input type="radio" name="garagem" id="garagem" value="Não">
                            <label for="garagem">Não</label>
                        </div>
                        <div class="form-group">
                            <h5>Disponibilidade</h5>

                            <input type="radio" name="disponibilidade" id="disponivel" value="Disponivel">
                            <label for="disponivel">Disponivel</label>
                            <input type="radio" name="disponibilidade" id="indisponivel" value="Indisponivel">
                            <label for="indisponivel">Indisponivel</label>
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" id="descricao" placeholder="Informações imovel"></textarea>
                        </div>

                        <input type="submit" value="Cadastrar Imóvel">
                    </form>
                </div>
            </div>

            <!-- Formulário de Pessoa Jurídica -->
            <div class="tab-pane fade" id="pessoaJuridica" role="tabpanel" aria-labelledby="pessoaJuridica-tab">
                <div class="shadow-box">
                    <h4>Cadastro de Corretor</h4>
                    <form id="pessoa_juridica" action="ADM_CRUD/inserir_corretor.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="foto_corretor">Foto do Corretor</label>
                            <input type="file" id="foto_corretor" name="foto_corretor" accept="image/*" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nome_emp">Nome do Corretor</label>
                            <input type="text" id="nome_emp" name="nome_emp" class="form-control" placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="senha_emp">Email</label>
                            <input type="email" id="email_emp" name="email_emp" class="form-control" placeholder="examplo@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone_emp">telefone</label>
                            <input type="text" id="telefone_emp" name="telefone_emp" oninput="validarInput(this)" title="A entrada deve conter apenas '() , -' e números." class="form-control" placeholder="example (00) 00000-0000" required>
                        </div>
                        <label for="biografia_emp">Biografia</label><br>
                        <textarea name="biografia_emp" id="biografia_emp"></textarea>
                        <div class="form-group">
                            <label for="id_corretora">ID da Corretora</label>
                            <input type="number" id="id_corretora" name="id_corretora" class="form-control" placeholder="ID da Corretora" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Adicionar Corretor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'ADM_CRUD/mostrar.php' ?>





    <script>
        function validarInput(input) {
            // Remove caracteres que não são permitidos
            input.value = input.value.replace(/[^\d()\s-]/g, '');
        }
        $(document).ready(function() {
            // Quando um botão de alternância é clicado
            $(".nav-link").click(function() {
                // Obtém o tipo de usuário a partir do atributo data-tipo
                var tipoUsuario = $(this).data("tipo");
                // Define o valor do input hidden com o tipo de usuário
                $("#tipoUsuario").val(tipoUsuario);
            });

            // Quando o formulário é enviado
            $("#formPessoaFisica").submit(function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário
                var formData = $(this).serialize(); // Obtém os dados do formulário


            });
        });

        // script para esconder o formulario de cadastro(evitar poulição visual)
        document.getElementById('esconder_formularios').addEventListener('click', function() {
            var div = document.getElementById('formularios_cadastro');
            if (div.style.display === 'none' || div.style.display === '') {
                div.style.display = 'block';
                this.textContent = 'Fechar Formularios de Cadastro';
            } else {
                div.style.display = 'none';
                this.textContent = 'Formularios de cadastro';
            }
        });
    </script>















    <?php include 'conteudo/footer.php' ?>
    <script>
        // inicio do link para abrir tela
        $(document).ready(function() {
            $('.color_button').on('click', function(event) {
                $('#profileFrame').toggleClass('show');
                $(this).toggleClass('active');
                if ($('#profileFrame').hasClass('show')) {
                    // Carrega o conteúdo do perfil via Ajax
                    $('#profileFrame').load('../menu.php');
                    // Altera o ícone para baixo quando o perfil é ativado
                    $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_down</i>');
                } else {
                    // Reverte o ícone para esquerda quando o perfil é desativado
                    $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_left</i>');
                }
                // Impede que o clique seja propagado para o documento
                event.stopPropagation();
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('.color_button').length && !$(event.target).closest('#profileFrame').length) {
                    $('#profileFrame').removeClass('show');
                    $('.color_button').removeClass('active');
                    // Reverte o ícone para esquerda quando o perfil é desativado
                    $('#elementoHTML').html('<i class="material-icons text-white" style="font-size: 30px;">keyboard_arrow_left</i>');
                }
            });
        });
    </script>
    <script src="JS/ADM_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>