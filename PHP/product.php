<?php
session_start();
require_once 'database.php';
include 'header.php';

// Get product ID
if(!isset($_GET['id'])) {
    echo "<div class='container my-5'><h3>Product not found.</h3></div>";
    include 'footer.php';
    exit;
}

$id = intval($_GET['id']);

// Fetch product details
$stmt = $pdo->prepare("SELECT * FROM products WHERE product_id = ? LIMIT 1");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$product) {
    echo "<div class='container my-5'><h3>Product not found.</h3></div>";
    include 'footer.php';
    exit;
}
?>

<div class="container my-5">

    <div class="row">
        <!-- Image -->
        <div class="col-md-5 mb-4">
            <img src="<?= $product['image_url'] ?>" 
                 class="img-fluid border rounded shadow" 
                 alt="<?= $product['name'] ?>">
        </div>

        <!-- Details -->
        <div class="col-md-7">
            <h2 class="fw-bold"><?= $product['name'] ?></h2>
            <p><strong>Brand:</strong> <?= $product['brand'] ?></p>
            <p><strong>Category:</strong> <?= $product['category'] ?></p>
            <h4 class="text-primary fw-bold mb-3">
                $<?= number_format($product['price'], 2) ?>
            </h4>

            <p><?= nl2br($product['description']) ?></p>

            <div class="mt-4">
                <a href="addtocart.php?id=<?= $product['product_id'] ?>" 
                   class="btn btn-success me-2">
                   Add to Cart
                </a>

                <a href="addtowishlist.php?id=<?= $product['product_id'] ?>" 
                   class="btn btn-outline-primary">
                   Add to Wishlist
                </a>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
