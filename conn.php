<?php
function connection() {
    // Mengoneksikan ke Database
    $dbhost = 'localhost';
    $dbUser = 'root';
    $dbPass = "";
    $dbName = "transupn";

    $conn = mysqli_connect($dbhost, $dbUser, $dbPass, $dbName);

    // Mengecek apakah koneksi nya berhasil atau tidak
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}
?>