<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "apotekita");

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Start session
session_start();

// Menggagalkan ke index karena belum login

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Periksa apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Ambil username dari session
    $username = $_SESSION['username'];

    // Query untuk mengambil data pengguna
    $query = "SELECT nama FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if (mysqli_num_rows($result) === 1) {
        // Ambil data pengguna
        $row = mysqli_fetch_assoc($result);
        $namaUser = $row['nama'];
    } else {
        $namaUser = "Pengguna";
    }
} else {
    $namaUser = "Pengguna";
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Logo Title -->
    <link rel="icon" href="img/medical-care.png" type="image/x-icon">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <title>ApoteKita</title>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark w-100">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/medical-care.png" alt="logos">ApoteKita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item me-5">
                        <a class="nav-link" aria-current="page" href="obat.php">Obat</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="pasien.php">Pasien</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link" href="dokter.php">Dokter</a>
                    </li>
                </ul>
                <a href="logout.php"><button class="usr-btn bg-transparent me-3">Log Out</button></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Section Start -->
    <section id="log-section" style="background-image: url('img/background.png'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="container log-form">
            <div class="row">
                <div class="col mt-5">
                    <?php
                    echo "<h1>Selamat datang, $namaUser!</h1>";
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Section End -->

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-8oa6vf1jRTE9oOyd8lHTy3TU9U8q58thYc7SJmfsAvuipKqI+KuIf3OPyNqHCNep" crossorigin="anonymous">
    </script>
</body>

</html>