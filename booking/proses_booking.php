<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Booking Berhasil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #00b09b, #96c93d);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .card-success {
      background: #fff;
      border-radius: 16px;
      padding: 3rem 2rem;
      box-shadow: 0 10px 40px rgba(0,0,0,0.2);
      text-align: center;
      max-width: 500px;
      animation: fadeIn 1s ease;
    }
    .checkmark {
      font-size: 4rem;
      color: #28a745;
      margin-bottom: 1rem;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: scale(0.95);}
      to {opacity: 1; transform: scale(1);}
    }
    a.btn-back {
      margin-top: 2rem;
    }
  </style>
</head>
<body>

  <div class="card-success">
    <div class="checkmark">✅</div>
    <h3 class="mb-3">Booking Berhasil!</h3>
    <p>Terima kasih telah melakukan booking lapangan futsal.<br>Silakan datang sesuai jadwal yang telah Anda pilih.</p>
    <a href="../index.php" class="btn btn-success btn-back">Kembali ke Beranda</a>
  </div>

</body>
</html>
