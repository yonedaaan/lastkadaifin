<?php
require_once 'function.php';

$pdo = connectDB();

$sql = 'DELETE FROM k_table WHERE image_id = :image_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

unset($pdo);
header('Location:index.php');
exit();
?>