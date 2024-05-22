<?php

include '../conexao/config.php';

// Recebendo os dados do formulário (campos basicos)
$usernome = $_POST['usernome'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$tipoUsuario = $_POST['tipoUsuario'];


// inserindo os dados que foram pegos no method POST
$query = "INSERT INTO usuario (user_nome,nome, email, senha, telefone, tipo) VALUES ('$usernome','$nome', '$email', '$senha', '$telefone', '$tipoUsuario')";
$result = mysqli_query($conexao, $query); // Executa a consulta

if ($result) { // Se a consulta for bem-sucedida
    $usuarioID = mysqli_insert_id($conexao); // Obter o ID do usuário inserido

    // Se for Pessoa Física
    if ($tipoUsuario == 1) {
        $cpf = $_POST['cpfPF'];
        $dataNascimento = $_POST['datanascimentoPF'];
        // Insira os dados na tabela pessoa_fisica
        $query = "INSERT INTO pessoa_fisica (usuario_id, cpf, data_nascimento) VALUES ('$usuarioID', '$cpf', '$dataNascimento')";
        $result = mysqli_query($conexao, $query); // Execute a consulta


    } elseif ($tipoUsuario == 2) { // Se for Pessoa Jurídica
        $inscricaoEstadual = $_POST['inscricaoestadual'];
        $cnpj = $_POST['cnpj'];
        $cpfPJ = $_POST['cpfPJ'];
        $datanascimentoPJ = $_POST['datanascimentoPJ'];
        $telefone_celularPJ = $_POST['telefone_celularPJ'];
        // Insira os dados na tabela pessoa_juridica
        $query = "INSERT INTO pessoa_juridica (usuario_id, inscricao_estadual, cnpj, cpf,data_nascimento,telefone_celular ) VALUES ('$usuarioID', '$inscricaoEstadual', '$cnpj','$cpfPJ','$datanascimentoPJ','$telefone_celularPJ')";
        $result = mysqli_query($conexao, $query); // Execute a consulta
    }

    if ($result) {
        // Dados inseridos com sucesso em ambas as tabelas
        header("Location: ../sessao/login.html");
    } else {
        // Se houver erro ao inserir dados na segunda tabela
        echo "Erro ao inserir dados na tabela secundária: " . mysqli_error($conexao);
    }

} else {
    // Se houver erro ao inserir dados na tabela de usuários
    echo "Erro ao inserir dados na tabela de usuários: " . mysqli_error($conexao);
}

// Fechar conexão
mysqli_close($conexao);
?>
