<?php
// includes/auth.php
session_start();
require_once __DIR__ . '/database.php';

function loginUser($email, $password): bool {
    global $pdo;
    $stmt = $pdo->prepare(query: "SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->execute(params: [$email]);
    $user = $stmt->fetch(mode: PDO::FETCH_ASSOC);

    if($user && password_verify(password: $password, hash: $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role']    = $user['role'];
        return true;
    }

    return false;
}

function registerUser($name, $email, $password) {
    global $pdo;

    // Check if email exists
    $check = $pdo->prepare(query: "SELECT id FROM users WHERE email = ? LIMIT 1");
    $check->execute(params: [$email]);

    if($check->fetch()) {
        return false; // Email already exists
    }

    // Hash password
    $hash = password_hash(password: $password, algo: PASSWORD_DEFAULT);

    // Insert user
    $stmt = $pdo->prepare(query: "INSERT INTO users (name, email, password_hash, role) VALUES (?,?,?,?)");
    return $stmt->execute(params: [$name, $email, $hash, 'user']);
}

