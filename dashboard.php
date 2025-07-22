<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Booking Futsal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background-color: #1e3c72;
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }
    .welcome {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: white;
      border-radius: 15px;
      padding: 2rem;
      margin-bottom: 2rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Booking Futsal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="booking/index.php">Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="booking/riwayat.php">Riwayat</a></li>
        <li class="nav-item"><a class="nav-link" href="auth/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="welcome text-center">
    <h1>Selamat Datang, <?= htmlspecialchars($user['nama']) ?>!</h1>
    <p>Selamat menggunakan sistem Booking Lapangan Futsal.</p>
  </div>

  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card p-4">
        <h4>Booking Sekarang</h4>
        <p>Lakukan pemesanan lapangan futsal dengan cepat.</p>
        <a href="booking/index.php" class="btn btn-primary">Booking</a>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="card p-4">
        <h4>Lihat Riwayat</h4>
        <p>Cek riwayat booking lapangan yang sudah kamu lakukan.</p>
        <a href="booking/riwayat.php" class="btn btn-outline-primary">Riwayat</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
