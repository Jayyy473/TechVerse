<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied");
}

require_once '../database.php';

$done = false;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("
      INSERT INTO products (sku, name, category, brand, price, image_url, short_desc, description)
      VALUES (?,?,?,?,?,?,?,?)
    ");
    $stmt->execute([
        $_POST['sku'],
        $_POST['name'],
        $_POST['category'],
        $_POST['brand'],
        $_POST['price'],
        $_POST['image_url'],
        $_POST['short_desc'],
        $_POST['description'],
    ]);

    $done = true;
}

include '../header.php';
?>

<div class="container my-5" style="max-width: 700px;">
  <h2 class="fw-bold mb-4">Add New Product</h2>

  <?php if($done): ?>
    <div class="alert alert-success">Product added!</div>
  <?php endif; ?>

  <form method="POST" class="border p-4 bg-light shadow-sm rounded">

    <input class="form-control mb-2" name="sku" placeholder="SKU" required>
    <input class="form-control mb-2" name="name" placeholder="Product Name" required>
    <input class="form-control mb-2" name="category" placeholder="Category" required>
    <input class="form-control mb-2" name="brand" placeholder="Brand">
    <input class="form-control mb-2" name="price" placeholder="Price" required>
    <input class="form-control mb-2" name="image_url" placeholder="Image URL">

    <input class="form-control mb-2" name="short_desc" placeholder="Short Description">
    <textarea class="form-control mb-3" name="description" rows="5" placeholder="Full Description"></textarea>

    <button class="btn btn-primary w-100" type="submit">Add Product</button>
  </form>
</div>

<?php include '../footer.php'; ?>
