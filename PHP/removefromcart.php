<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'includes/db.php';

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
}

header("Location: cart.php");
exit;
