<?php
include("db.php");

$id = $_GET['id'];

$sql = "SELECT * FROM cliente WHERE ID = $id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();


if (isset($_POST['salvar'])) {
    $nome = $_POST['nome_completo'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $servico = $_POST['servico_preferido'];

    $sql_update = "UPDATE cliente SET 
        nome_completo='$nome', 
        Data_nascimento='$data_nascimento', 
        telefone='$telefone', 
        email='$email', 
        endereco='$endereco', 
        Servico_preferido='$servico' 
        WHERE ID=$id";

    $conn->query($sql_update);
    header("Location: index.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
     <link rel="stylesheet" href="style.css">
    <script src="script.js"> </script>
</head>
<body>
    <h1>Editar Cliente</h1>

    <form method="POST" action="">
        <label>Nome completo:</label>
        <input type="text" name="nome_completo" value="<?= $cliente['nome_completo'] ?>" required>

        <label>Data de nascimento:</label>
        <input type="date" name="data_nascimento" value="<?= $cliente['Data_nascimento'] ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $cliente['email'] ?>" required>

        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?= $cliente['endereco'] ?>" required>

        <label>Serviço preferido:</label>
        <input type="text" name="servico_preferido" value="<?= $cliente['Servico_preferido'] ?>" required>

        <button type="submit" name="salvar">Salvar Alterações</button>
    </form>

    <br>
    <a href="index.php"> Voltar à Lista</a>
</body>
</html>
