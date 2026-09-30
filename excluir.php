<?php
require_once __DIR__ . '/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    header('Location: index.php?erro=Cliente inválido');
    exit;
}

$stmt = $conn->prepare('DELETE FROM cliente WHERE ID = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header('Location: index.php?sucesso=Cliente excluído');
exit;
