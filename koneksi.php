<?php

$host = "localhost";     // biasanya localhost
$user = "root";          // username database
$pass = "";              // password database, default kosong di XAMPP
$db   = "db_marva";        // nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
