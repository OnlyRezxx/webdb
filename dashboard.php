<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

echo "Halo, " . $_SESSION["username"] . "!<br>";
echo "Klik di bawah untuk masuk ke phpMyAdmin dengan akun database Anda:<br>";
echo "<a href='http://your-server-ip/phpmyadmin' target='_blank'>Buka phpMyAdmin</a>";
?>

<br><br>
<a href="logout.php">Logout</a>
