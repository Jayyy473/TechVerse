<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'database.php';

$product_id = intval($_GET['id']);
$user_id    = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT id FROM wishlist WHERE user_id = ? AND product_id = ?");
$stmt->execute([$user_id, $product_id]);

if(!$stmt->fetch()) {
    $insert = $pdo->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?,?)");
    $insert->execute([$user_id, $product_id]);
}

header("Location: wishlist.php");
exit;
