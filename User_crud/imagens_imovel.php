<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar imagens
$sql = "SELECT image_path FROM images";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Imagens</title>
</head>
<body>
    <h1>Imagens</h1>
    <?php
    if ($result->num_rows > 0) {
        // Exibir imagens
        while($row = $result->fetch_assoc()) {
            echo '<img src="' . $row["image_path"] . '" alt="Imagem" style="width:200px;height:auto;"><br>';
        }
    } else {
        echo "Nenhuma imagem encontrada.";
    }

    $conn->close();
    ?>
</body>
</html>
