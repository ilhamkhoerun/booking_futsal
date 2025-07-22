<?php
require '../config/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($nama) || empty($username) || empty($password)) {
        $errors[] = "Semua field wajib diisi!";
    } else {
        // Cek username sudah ada atau belum
        $cek = $conn->prepare("SELECT * FROM users2 WHERE username = ?");
        $cek->bind_param("s", $username);
        $cek->execute();
        $cek->store_result();

        if ($cek->num_rows > 0) {
            $errors[] = "Username sudah digunakan!";
        } else {
            // Simpan user baru
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users2 (nama, username, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $username, $hash);
            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $errors[] = "Gagal mendaftar. Coba lagi!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Booking Futsal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #2c3e50, #3498db);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
    }
    .card {
      background-color: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      max-width: 450px;
      width: 100%;
    }
    .form-control {
      background-color: rgba(255,255,255,0.2);
      color: white;
      border: none;
    }
    .form-control::placeholder {
      color: #ccc;
    }
    .btn-warning {
      font-weight: bold;
      color: black;
    }
    .text-danger {
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="card">
    <h3 class="text-center mb-4">Registrasi Akun</h3>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <div><?= $error ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-warning w-100">Daftar</button>
    </form>

    <p class="text-center mt-3">Sudah punya akun? <a href="login.php" class="text-light">Login</a></p>
  </div>
</body>
</html>
