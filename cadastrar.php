<?php
include("db.php");

$nome = @$_POST['nome_completo'];
$data_nascimento = @$_POST['data_nascimento'];
$telefone = @$_POST['telefone'];
$email = @$_POST['email'];
$endereco = @$_POST['endereco'];
$servico = @$_POST['servico_preferido'];

if (isset($_POST['nome_completo'], $_POST['telefone'], $_POST['servico_preferido'])) {
    $sql = "INSERT INTO cliente (nome_completo, Data_nascimento, telefone, email, endereco, Servico_preferido)
            VALUES ('$nome', '$data_nascimento', '$telefone', '$email', '$endereco', '$servico')";
    $conn->query($sql);
    header("Location: index.php");
    exit;
}
?>
