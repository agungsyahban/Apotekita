<?php

include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan password_hash untuk mengenkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Menggunakan prepared statement untuk menghindari SQL injection
    // Periksa apakah username sudah digunakan sebelumnya
    $checkQuery = "SELECT * FROM user WHERE username = ?";
    $checkStmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "s", $username);
    mysqli_stmt_execute($checkStmt);

    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username sudah digunakan, tampilkan pesan dengan JavaScript
        echo "<script>alert('Username sudah digunakan. Silakan gunakan username lain.');window.location = 'daftar.php';</script>";
    } else {
        // Username belum digunakan, lakukan pendaftaran
        $query = "INSERT INTO user (nama, username, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $nama, $username, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            // Pendaftaran berhasil
            header("Location: login.php");
            exit();
        } else {
            echo "Pendaftaran Gagal";
        }
    }
}

if (isset($_POST['login'])) {

    // Start session
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statement untuk menghindari SQL injection
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Cek Username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi Password menggunakan password_verify
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true; // User login = true
            $_SESSION['username'] = $username; // Simpan informasi pengguna yang sudah login ke dalam session
            echo "<script>alert('Login Berhasil'); window.location = 'index.php';</script>";
            exit();
        }
    }

    echo "<script>alert('Login Gagal'); window.location = 'login.php';</script>";
}
