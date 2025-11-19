<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied");
}

require_once '../database.php';
include '../header.php';

$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-5">
  <h2 class="fw-bold mb-4">Admin: Product Manager</h2>

  <a href="new_product.php" class="btn btn-primary mb-3">Add Product</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product</th><th>Category</th><th>Price</th><th></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($products as $p): ?>
        <tr>
          <td><?= $p['name'] ?></td>
          <td><?= $p['category'] ?></td>
          <td>$<?= number_format($p['price'],2) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include '../footer.php'; ?>