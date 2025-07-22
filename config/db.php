<?php
require_once _DIR_ . '/../vendor/autoload.php'; // Composer autoload

// Load file .env
$dotenv = Dotenv\Dotenv::createImmutable(_DIR_ . '/../');
$dotenv->load();

// Ambil variabel dari .env
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db   = $_ENV['DB_NAME'];

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>