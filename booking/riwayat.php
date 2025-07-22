<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];

// Ambil data booking milik user ini
$query = $conn->prepare("SELECT b.*, l.nama AS nama_lapangan 
                        FROM booking b
                        JOIN lapangan l ON b.lapangan_id = l.id
                        WHERE b.user_id = ?
                        ORDER BY b.tanggal DESC, b.jam_mulai DESC");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Riwayat Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1abc9c, #16a085);
      color: white;
      min-height: 100vh;
    }
    .container {
      padding-top: 5rem;
    }
    .table {
      background-color: rgba(255,255,255,0.1);
      color: white;
      border-radius: 12px;
      overflow: hidden;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    a.back-btn {
      color: #fff;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2 class="text-center mb-4">Riwayat Booking Lapangan</h2>

    <?php if ($result->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-white">
          <thead>
            <tr>
              <th>No</th>
              <th>Lapangan</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_lapangan']) ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['jam_mulai'] ?> - <?= $row['jam_selesai'] ?></td>
                <td><?= $row['status'] ?? 'Menunggu' ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="alert alert-info text-center">Belum ada booking.</div>
    <?php endif; ?>

    <div class="text-center mt-4">
      <a href="../dashboard.php" class="back-btn">← Kembali ke Dashboard</a>
    </div>
  </div>

</body>
</html>
