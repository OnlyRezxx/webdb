<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Cek apakah user sudah ada
    $check = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        echo "Username sudah terdaftar!";
    } else {
        // Buat akun di MySQL
        $sql = "CREATE USER '$username'@'localhost' IDENTIFIED BY '".$_POST["password"]."';
                GRANT ALL PRIVILEGES ON *.* TO '$username'@'localhost' WITH GRANT OPTION;
                FLUSH PRIVILEGES;";
        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        $conn->multi_query($sql);
        echo "Akun berhasil dibuat! Silakan login.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
