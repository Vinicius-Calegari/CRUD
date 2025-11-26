<?php
include("db.php");

$id = $_GET['id'];

$sql = "DELETE FROM cliente WHERE ID = $id";
$conn->query($sql);

header("Location: index.php");
exit;
?>
