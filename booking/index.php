<?php
session_start();
require '../config/db.php';

// Cek login
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Ambil data lapangan
$lapangan = $conn->query("SELECT * FROM lapangan");

// Cek error query
if (!$lapangan) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booking Lapangan Futsal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      color: #fff;
    }
    .booking-card {
      background-color: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      padding: 2rem;
      border-radius: 15px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }
    label {
      margin-top: 10px;
    }
    .form-control {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
    }
    .form-control::placeholder {
      color: #ccc;
    }
    .btn-primary {
      background-color: #ffc107;
      border: none;
      color: #000;
      font-weight: bold;
    }
    a {
      color: #ffc107;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="booking-card">
    <h2 class="text-center mb-4">Form Booking Lapangan</h2>
    <form action="proses_booking.php" method="POST">
      <div class="mb-3">
        <label for="lapangan_id" class="form-label">Pilih Lapangan</label>
        <select class="form-control" name="lapangan_id" id="lapangan_id" required>
          <?php if ($lapangan->num_rows > 0): ?>
            <?php while ($row = $lapangan->fetch_assoc()) : ?>
              <option value="<?= $row['id'] ?>">
                <?= $row['nama'] ?> - Rp<?= number_format($row['harga']) ?>
              </option>
            <?php endwhile; ?>
          <?php else: ?>
            <option value="">Belum ada data lapangan</option>
          <?php endif; ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
      </div>

      <div class="mb-3">
        <label for="jam_mulai" class="form-label">Jam Mulai</label>
        <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" required>
      </div>

      <div class="mb-3">
        <label for="jam_selesai" class="form-label">Jam Selesai</label>
        <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Booking Sekarang</button>
      </div>
    </form>
    <div class="text-center mt-3">
      <a href="../dashboard.php">← Kembali ke Dashboard</a>
    </div>
  </div>
</body>
</html>
