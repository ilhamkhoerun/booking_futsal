<?php
session_start();
require '../config/db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: ../dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Booking Futsal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
      background-color: #fff;
      padding: 2rem;
      border-radius: 15px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }
    .login-card h3 {
      margin-bottom: 1.5rem;
      color: #2a5298;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #2a5298;
    }
    .btn-primary {
      background-color: #2a5298;
      border: none;
    }
    .text-danger {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3 class="text-center">Login Admin/User</h3>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required />
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control" name="password" required />
      </div>

      <div class="d-grid">
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
    <div class="text-center mt-3">
      <a href="register.php">Belum punya akun? Daftar</a>
    </div>
  </div>
</body>
</html>
