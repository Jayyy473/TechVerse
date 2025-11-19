<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'database.php';
include 'header.php';

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
 SELECT cart_items.id, cart_items.quantity, products.*
 FROM cart_items
 JOIN products ON cart_items.product_id = products.product_id
 WHERE cart_items.user_id = ?
");
$stmt->execute([$user_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total
$total = 0;
foreach($items as $i) {
    $total += $i['price'] * $i['quantity'];
}
?>

<div class="container my-5">

  <h2 class="fw-bold mb-4">Your Cart</h2>

  <?php if(!$items): ?>
      <p>Your cart is empty.</p>
  <?php else: ?>

      <table class="table table-bordered align-middle">
          <thead>
              <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>

          <?php foreach($items as $item): ?>
              <tr>
                <td><?= $item['name'] ?></td>

                <td>$<?= number_format($item['price'], 2) ?></td>

                <td><?= $item['quantity'] ?></td>

                <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>

                <td>
                  <a href="remove_from_cart.php?id=<?= $item['id'] ?>" 
                     class="btn btn-danger btn-sm">Remove</a>
                </td>
              </tr>
          <?php endforeach; ?>

          </tbody>
      </table>

      <div class="fw-bold fs-4">
        Cart Total: $<?= number_format($total, 2) ?>
      </div>

  <?php endif; ?>
</div>

<?php include 'footer.php'; ?>