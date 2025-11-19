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
 SELECT wishlist.id, products.*
 FROM wishlist
 JOIN products ON wishlist.product_id = products.product_id
 WHERE wishlist.user_id = ?
");
$stmt->execute([$user_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-5">
  <h2 class="fw-bold mb-4">Your Wishlist</h2>

  <?php if(!$items): ?>
    <p>No items in wishlist.</p>
  <?php else: ?>

    <div class="row g-4">
    <?php foreach($items as $p): ?>
      <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow-sm">
              <img src="<?= $p['image_url'] ?>" class="card-img-top">
              <div class="card-body">
                  <h6 class="fw-bold"><?= $p['name'] ?></h6>
                  <p class="text-primary fw-bold mb-1">
                     $<?= number_format($p['price'],2) ?>
                  </p>
                  <a href="add_to_cart.php?id=<?= $p['product_id'] ?>" class="btn btn-success btn-sm">
                      Move to Cart
                  </a>
              </div>
          </div>
      </div>
    <?php endforeach; ?>
    </div>

  <?php endif; ?>

</div>

<?php include 'footer.php'; ?>
