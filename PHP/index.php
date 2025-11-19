<?php include 'header.php'; ?>

<!-- HERO SECTION -->
<div class="container-fluid bg-dark text-light p-5">
  <div class="container py-5">
    <h1 class="display-4 fw-bold">Welcome to Techverse</h1>
    <p class="lead">Your marketplace for smartphones, laptops, tablets, wearables, and more.</p>
    <a href="products.php" class="btn btn-primary btn-lg mt-3">Shop Now</a>
  </div>
</div>

<!-- CATEGORY GRID -->
<div class="container my-5">
  <h2 class="fw-bold mb-4">Top Categories</h2>

  <div class="row g-4">
    <!-- Phones -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=Phones">
        <div class="p-4 border rounded text-center shadow-sm">
          📱<br>Phones
        </div>
      </a>
    </div>

    <!-- Laptops -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=Laptops">
        <div class="p-4 border rounded text-center shadow-sm">
          💻<br>Laptops
        </div>
      </a>
    </div>

    <!-- Tablets -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=Tablets">
        <div class="p-4 border rounded text-center shadow-sm">
          📝<br>Tablets
        </div>
      </a>
    </div>

    <!-- Smart Watches -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=Wearables">
        <div class="p-4 border rounded text-center shadow-sm">
          ⌚<br>Smart Watches
        </div>
      </a>
    </div>

    <!-- Earbuds -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=Audio">
        <div class="p-4 border rounded text-center shadow-sm">
          🎧<br>Earbuds & Audio
        </div>
      </a>
    </div>

    <!-- PCs -->
    <div class="col-6 col-md-4 col-lg-3">
      <a class="text-decoration-none" href="products.php?category=PCs">
        <div class="p-4 border rounded text-center shadow-sm">
          🖥<br>Desktop PCs
        </div>
      </a>
    </div>

  </div>
</div>

<!-- FEATURED PRODUCTS Placeholder -->
<div class="container my-5">
  <h2 class="fw-bold mb-4">Featured Products</h2>
  <p class="text-muted">Products will show here once we build the product system.</p>
</div>

<?php include 'footer.php'; ?>
