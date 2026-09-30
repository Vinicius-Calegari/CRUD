<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome = trim($_POST['nome_completo'] ?? '');
$dataNascimento = trim($_POST['data_nascimento'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$endereco = trim($_POST['endereco'] ?? '');
$servico = trim($_POST['servico_preferido'] ?? '');

if ($nome === '' || $dataNascimento === '' || $telefone === '' || !$email || $endereco === '' || $servico === '') {
    header('Location: index.php?erro=Dados inválidos');
    exit;
}

$stmt = $conn->prepare(
    'INSERT INTO cliente (nome_completo, Data_nascimento, telefone, email, endereco, Servico_preferido) VALUES (?, ?, ?, ?, ?, ?)'
);
$stmt->bind_param('ssssss', $nome, $dataNascimento, $telefone, $email, $endereco, $servico);
$stmt->execute();
$stmt->close();

header('Location: index.php?sucesso=Cliente cadastrado');
exit;
