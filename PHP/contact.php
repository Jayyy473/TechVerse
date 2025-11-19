<?php
require_once 'database.php';
include 'header.php';

$sent = false;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $msg   = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?,?,?)");
    $stmt->execute([$name, $email, $msg]);

    $sent = true;
}
?>

<div class="container my-5" style="max-width: 600px;">
  <h2 class="fw-bold mb-4">Contact Techverse</h2>

  <?php if($sent): ?>
    <div class="alert alert-success">
      Thank you, your message has been sent!
    </div>
  <?php endif; ?>

  <form method="POST" class="border p-4 rounded shadow-sm bg-light">
      <div class="mb-3">
          <label class="form-label fw-bold">Name</label>
          <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
          <label class="form-label fw-bold">Email</label>
          <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
          <label class="form-label fw-bold">Message</label>
          <textarea name="message" class="form-control" rows="4" required></textarea>
      </div>

      <button class="btn btn-primary w-100" type="submit">Send Message</button>
  </form>
</div>

<?php include 'footer.php'; ?>
