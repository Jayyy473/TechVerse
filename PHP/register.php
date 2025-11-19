<?php
session_start();
require_once 'database.php';
require_once 'auth.php';

// If logged in, don't register again
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = "";
$success = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);

    if($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        if(registerUser($name, $email, $password)) {
            $success = "Account created successfully! You may now log in.";
        } else {
            $error = "Email already exists or registration failed.";
        }
    }
}

include 'header.php';
?>

<div class="container my-5" style="max-width: 500px;">
    <h2 class="fw-bold mb-4 text-center">Create Your Techverse Account</h2>

    <?php if($error): ?>
      <div class="alert alert-danger">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <?php if($success): ?>
      <div class="alert alert-success">
        <?= $success ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="border p-4 rounded shadow-sm bg-light">

        <div class="mb-3">
            <label class="form-label fw-bold">Full Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Your name">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" required placeholder="you@example.com">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Confirm Password</label>
            <input type="password" name="confirm" class="form-control" required placeholder="Re-enter password">
        </div>

        <button class="btn btn-primary w-100" type="submit">Register</button>

        <div class="text-center mt-3">
            <a href="login.php">Already have an account? Log in</a>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
