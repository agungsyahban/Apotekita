<!doctype html>
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

    <!-- Javascript -->
    <script src="js/script.js"></script>

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>ApoteKita</title>
</head>

<section id="nav-section">

    <body>
        <!-- Navbar Start -->

        <nav class="navbar navbar-expand-lg navbar-dark w-100">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/medical-care.png" alt="logos">ApoteKita</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="daftar.php"><button class="usr-btn bg-transparent me-3">Daftar</button></a>
            </div>
            </div>
            </div>
        </nav>
</section>
<!-- Navbar End -->

<!-- Section Start -->

<section id="log-section">
    <div class="container log-tag mt-3">
        <h1>Halaman Login</h1>
    </div>
    <div class="container log-content mb-5">
        <div class="row">
            <div class="col content">
                <h1>
                    <img src="img/medical-care.png">
                    ApoteKita
                </h1>
            </div>
        </div>
    </div>
    <div class="container log-form">
        <div class="row">
            <div class="col">
                <form action="proses.php" method="POST">
                    <label for="username">USERNAME</label>
                    <input type="text" placeholder="USERNAME" name="username" id="username" class="form-input d-block mb-3">
                    <label for="password">PASSWORD</label>
                    <input type="password" placeholder="PASSWORD" name="password" id="password" class="form-input d-block mb-3">

                    <!-- CAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6Le-Q8cmAAAAAJA97nj2-rEJJ2WGSblAu9XTQAPa"></div>
                    <!-- Ganti YOUR_RECAPTCHA_SITE_KEY dengan kunci reCAPTCHA Anda -->

                    <button type="submit" name="login" class="btn-login mt-2">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Section End -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>

</html>