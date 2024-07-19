<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM obat;";
$sql = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Logo Title -->
    <link rel="icon" href="img/medical-care.png" type="image/x-icon">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Javascript -->
    <script src="js/script.js"></script>

    <title>ApoteKita</title>
</head>

<body>
    <!-- Navbar Start -->
    <section id="nav-section">
        <nav class="navbar navbar-expand-lg navbar-dark w-100">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/medical-care.png" alt="logos">ApoteKita</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    <div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- Navbar End -->

    <!-- Section Start -->
    <section id="obat-section">
        <div class="container log-tag mb-3 mt-3">
            <h1>Halaman Obat</h1>
        </div>
        <div class="container">
            <button class="add-btn mt-3 mb-4">Tambah Data</button>
        </div>
        <div class="container mt-4">
            <div class="row">
                <?php
                if (mysqli_num_rows($sql) > 0) {
                    while ($result = mysqli_fetch_assoc($sql)) {
                ?>
                <div class="col-4">
                    <div class="card mb-5 obat-content" style="width: 18rem;">
                        <img src="img/<?php echo $result['img_obat']; ?>" class="card-img-top p-0">
                        <div class="card-body card-content">
                            <h5 class="card-title">
                                <?php echo $result['nama_obat']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $result['desk_obat']; ?>
                            </p>
                            <div class="mx-auto">
                                <button type="button" class="btn btn-success ms-2">Edit</button>
                                <button type="button" class="btn btn-danger ms-2">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                } else {
                    echo "<p>No data available.</p>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Section End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>