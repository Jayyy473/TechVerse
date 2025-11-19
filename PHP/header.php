<?php
// includes/header.php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Techverse | Smart Tech Marketplace</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/index.php">TECHVERSE</a>

    <button class="navbar-toggler" type="button" 
      data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/products.php">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="/cart.php">Cart</a></li>
        <li class="nav-item"><a class="nav-link" href="/login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
