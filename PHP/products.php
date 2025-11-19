<?php
session_start();
require_once 'database.php';
include 'header.php';

// Check if a category filter exists
$category = isset($_GET['category']) ? $_GET['category'] : null;

if($category) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ? ORDER BY created_at DESC");
    $stmt->execute([$category]);
} else {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
}

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container my-5">

    <h2 class="fw-bold mb-4">
      <?= $category ? $category : "All Products" ?>
    </h2>

    <div class="row g-4">
        <?php if(!$products): ?>
            <p class="text-muted">No products found.</p>
        <?php else: ?>
            <?php foreach($products as $p): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="product.php?id=<?= $p['product_id'] ?>" class="text-decoration-none text-dark">
                        <div class="card shadow-sm">
                            <img src="<?= $p['image_url'] ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                            <div class="card-body">
                                <h6 class="fw-bold"><?= $p['name'] ?></h6>
                                <p class="text-primary fw-bold mb-1">
                                  $<?= number_format($p['price'], 2) ?>
                                </p>
                                <small class="text-muted"><?= $p['brand'] ?></small>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>

<?php include 'footer.php'; ?>
