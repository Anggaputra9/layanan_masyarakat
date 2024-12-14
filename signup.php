<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirmPassword']);

    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi tidak sama.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO login (email, password, role) VALUES ('$email', '$hashed_password', 'user')";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>
            alert('akun anda telah didaftarkan');
            window.location.href = 'login.php';
        </script>";
            exit;
        } else {
            $error = "<script>alert('terjadi kesalahan');</script>" . mysqli_error($koneksi);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="image/logoNavbar.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <!-- Signup Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-center">Daftar Akun Baru</h2>
                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
                <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>
        </div>
    </div>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endif; ?>

    <!-- Footer -->
    <?php include "footer.php"; ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>