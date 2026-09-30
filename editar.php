<?php
require_once __DIR__ . '/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    header('Location: index.php?erro=Cliente inválido');
    exit;
}

$stmt = $conn->prepare('SELECT * FROM cliente WHERE ID = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$cliente = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$cliente) {
    header('Location: index.php?erro=Cliente não encontrado');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $nome = trim($_POST['nome_completo'] ?? '');
    $dataNascimento = trim($_POST['data_nascimento'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $endereco = trim($_POST['endereco'] ?? '');
    $servico = trim($_POST['servico_preferido'] ?? '');

    if ($nome === '' || $dataNascimento === '' || $telefone === '' || !$email || $endereco === '' || $servico === '') {
        $erro = 'Preencha os campos com dados válidos.';
    } else {
        $stmt = $conn->prepare('UPDATE cliente SET nome_completo = ?, Data_nascimento = ?, telefone = ?, email = ?, endereco = ?, Servico_preferido = ? WHERE ID = ?');
        $stmt->bind_param('ssssssi', $nome, $dataNascimento, $telefone, $email, $endereco, $servico, $id);
        $stmt->execute();
        $stmt->close();
        header('Location: index.php?sucesso=Cliente atualizado');
        exit;
    }
}

function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="titulo">Editar Cliente</h1>
        <?php if (isset($erro)): ?><p><?= e($erro) ?></p><?php endif; ?>
        <section class="card">
            <form method="POST" class="formulario">
                <div class="campo"><label>Nome completo:</label><input type="text" name="nome_completo" value="<?= e($cliente['nome_completo']) ?>" required></div>
                <div class="campo"><label>Data de nascimento:</label><input type="date" name="data_nascimento" value="<?= e($cliente['Data_nascimento']) ?>" required></div>
                <div class="campo"><label>Telefone:</label><input type="text" name="telefone" value="<?= e($cliente['telefone']) ?>" required></div>
                <div class="campo"><label>Email:</label><input type="email" name="email" value="<?= e($cliente['email']) ?>" required></div>
                <div class="campo"><label>Endereço:</label><input type="text" name="endereco" value="<?= e($cliente['endereco']) ?>" required></div>
                <div class="campo"><label>Serviço preferido:</label><input type="text" name="servico_preferido" value="<?= e($cliente['Servico_preferido']) ?>" required></div>
                <button type="submit" name="salvar" class="btn">Salvar alterações</button>
            </form>
            <p><a href="index.php">Voltar à lista</a></p>
        </section>
    </div>
</body>
</html>
