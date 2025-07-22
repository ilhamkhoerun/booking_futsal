<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Selamat Datang - Booking Lapangan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #2b5876, #4e4376);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }
    .container-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      padding: 3rem;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0,0,0,0.3);
      animation: slideFade 1s ease;
    }
    h1 {
      font-weight: bold;
      margin-bottom: 1rem;
    }
    a.btn-custom {
      margin: 0.5rem;
      padding: 0.6rem 2rem;
      font-weight: bold;
      border-radius: 30px;
      background-color: #00c9a7;
      border: none;
      color: white;
      transition: 0.3s;
      text-decoration: none;
    }
    a.btn-custom:hover {
      background-color: #00b894;
      color: white;
    }
    @keyframes slideFade {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

  <div class="container-box">
    <h1>Selamat Datang di Sistem Booking Lapangan</h1>
    <p class="mb-4">Silakan login atau daftar terlebih dahulu untuk melakukan pemesanan.</p>
    <a href="auth/login.php" class="btn btn-custom">Login</a>
    <a href="auth/register.php" class="btn btn-custom">Register</a>
  </div>

</body>
</html>
