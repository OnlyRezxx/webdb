<?php
$host = "localhost"; // Ubah jika pakai server eksternal
$user = "root"; // User MySQL utama
$pass = "your_root_password"; // Ganti dengan password root MySQL
$db = "user_db"; // Nama database

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
