<?php
$servername = "localhost"; // Nama server
$username = "root"; // Nama pengguna MySQL
$password = ""; // Kata sandi MySQL
$dbname = "restoran"; // Nama database yang akan diakses

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
