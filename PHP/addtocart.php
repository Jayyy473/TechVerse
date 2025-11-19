<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'database.php';

if(!isset($_GET['id'])) {
    header("Location: products.php");
    exit;
}

$product_id = intval($_GET['id']);
$user_id    = $_SESSION['user_id'];

// Check if already in cart
$stmt = $pdo->prepare("SELECT * FROM cart_items WHERE user_id = ? AND product_id = ?");
$stmt->execute([$user_id, $product_id]);
$existing = $stmt->fetch(PDO::FETCH_ASSOC);

if($existing) {
    // Increase quantity
    $update = $pdo->prepare("UPDATE cart_items SET quantity = quantity + 1 WHERE id = ?");
    $update->execute([$existing['id']]);
} else {
    // Insert new
    $insert = $pdo->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?,?,1)");
    $insert->execute([$user_id, $product_id]);
}

header("Location: cart.php");
exit;
