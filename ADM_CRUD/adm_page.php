<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Imóveis</title>
    <link rel="shortcut icon" href="../assets/guaxinim-sem-fundo.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../CSS/ADM_page.css">

</head>
<body>
    
  <!-- Formulário de cadastro -->
  

  <div class="container mt-4 bg-white">
     
        <hr>
        <!-- Abas para alternar entre Pessoa Física e Pessoa Jurídica -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" style="text-decoration: none;" id="imovelcadastro-tab" data-toggle="tab" href="#cadastro_imovel" role="tab" aria-controls="pessoaFisica" aria-selected="true" data-tipo="1">Cadastro de Imovel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="text-decoration: none;"  id="pessoaJuridica-tab" data-toggle="tab" href="#pessoaJuridica" role="tab" aria-controls="pessoaJuridica" aria-selected="false" data-tipo="2">Cadastro de Corretor</a>
          </li>
        </ul>
<div class="tab-content mb-5" id="myTabContent">
                <!-- Formulário de Pessoa Física id="propertyForm" -->
  <div class="tab-pane fade show active " id="cadastro_imovel" role="tabpanel" aria-labelledby="imovelcadastro-tab">
      <div class="shadow-box">
            <h4>Cadastro de Imóveis</h4>
                    <form id="cadastro_imovel" action="inserir_imovel.php" method="POST" enctype="multipart/form-data">
                    
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
                            <input type="text" id="endereco" name="endereco" placeholder="endereço" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="preco" name="preco" placeholder="preço" required>
                        </div>
                        <div class="form-group">
                            <input type="number" id="corretorid" name="corretorid" placeholder="id_corretor" required>
                        </div>
                        <div class="form-group">
                            <input type="number" id="quartos" name="quartos" placeholder="Quantos quartos?" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="area_contruida" name="area_construida" placeholder="medidas da Area Construida" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="preco" name="suite" placeholder="Possui Suite? quantas?" required>
                        </div>

                        <div class="form-group" >
                            <h5>Garagem</h5>

                            <input type="radio" name="garagem" id="garagem1" value="Sim" >
                            <label for="garagem1">sim</label>
                            <input type="radio" name="garagem" id="garagem" value="Não" >
                            <label for="garagem">Não</label>
                        </div>
                        <div class="form-group" >
                            <textarea name="descricao" id="descricao" placeholder="Informações imovel" ></textarea>
                        </div>
                        
                        <input type="submit" value="Cadastrar Imóvel">
                    </form>
      </div>
  </div>

            <!-- Formulário de Pessoa Jurídica -->
  <div class="tab-pane fade" id="pessoaJuridica" role="tabpanel" aria-labelledby="pessoaJuridica-tab">
            <div class="shadow-box">
                        <h4>Cadastro de Corretor</h4>
                <form id="pessoa_juridica" action="Crud_corretores/inserir_corretor.php" method="POST" enctype="multipart/form-data">
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
                            <label for="senha_emp">Senha</label>
                            <input type="password" id="senha_emp" name="senha_emp" class="form-control" placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <label for="id_corretora">ID da Corretora</label>
                            <input type="number" id="id_corretora" name="id_corretora" class="form-control" placeholder="ID da Corretora" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Adicionar Corretor</button>
                    </form>
      </div>
  </div>
</div>




 <script>
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
</script>




  







    
    <hr>
    
   
    <?php include 'mostrar.php' ?>
    <script src="../JS/ADM_page.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
