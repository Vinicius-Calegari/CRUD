<?php
require_once __DIR__ . '/db.php';
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
$result = $conn->query('SELECT * FROM cliente ORDER BY ID DESC');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<div class="container">
    <h1 class="titulo">Gestão de Clientes</h1>
    <?php if (isset($_GET['sucesso'])): ?><p><?= e($_GET['sucesso']) ?></p><?php endif; ?>
    <?php if (isset($_GET['erro'])): ?><p><?= e($_GET['erro']) ?></p><?php endif; ?>

    <section class="card">
        <h2>Cadastrar novo cliente</h2>
        <form method="POST" action="cadastrar.php" class="formulario">
            <div class="campo"><label>Nome completo:</label><input type="text" name="nome_completo" maxlength="255" required></div>
            <div class="campo"><label>Data de nascimento:</label><input type="date" name="data_nascimento" required></div>
            <div class="campo"><label>Telefone:</label><input type="tel" name="telefone" maxlength="20" required></div>
            <div class="campo"><label>Email:</label><input type="email" name="email" maxlength="100" required></div>
            <div class="campo"><label>Endereço:</label><input type="text" name="endereco" maxlength="150" required></div>
            <div class="campo"><label>Serviço preferido:</label><input type="text" name="servico_preferido" maxlength="50" required></div>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </section>

    <section class="card">
        <h2>Clientes cadastrados</h2>
        <div style="overflow-x:auto">
            <table class="tabela">
                <thead><tr><th>ID</th><th>Nome</th><th>Telefone</th><th>Email</th><th>Serviço</th><th>Ações</th></tr></thead>
                <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($linha = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= (int) $linha['ID'] ?></td>
                            <td><?= e($linha['nome_completo']) ?></td>
                            <td><?= e($linha['telefone']) ?></td>
                            <td><?= e($linha['email']) ?></td>
                            <td><?= e($linha['Servico_preferido']) ?></td>
                            <td class="acoes">
                                <a class="editar" href="editar.php?id=<?= (int) $linha['ID'] ?>">Editar</a>
                                <a class="excluir" href="excluir.php?id=<?= (int) $linha['ID'] ?>" onclick="return confirm('Excluir este cliente?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6">Nenhum cliente cadastrado.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
</body>
</html>
