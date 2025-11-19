<?php
// login.php
session_start();
require_once 'database.php'; // we will create db.php soon
require_once 'auth.php'; // handles login logic

// If already logged in, redirect
if(isset($_SESSION['user_id'])) {
  header(header: "Location: index.php");
  exit;
}

$error = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $pass  = trim($_POST['password']);

    if(loginUser(email: $email, password: $pass)) {
        header(header: "Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

include 'header.php';
?>

<div class="container my-5" style="max-width: 500px;">
    <h2 class="fw-bold mb-4 text-center">Login to Techverse</h2>

    <?php if($error): ?>
      <div class="alert alert-danger">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="border p-4 rounded shadow-sm bg-light">
        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" required placeholder="you@example.com">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>

        <button class="btn btn-primary w-100 mt-3" type="submit">Login</button>

        <div class="text-center mt-3">
            <a href="register.php">Don’t have an account? Register</a>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
