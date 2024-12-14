<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM login WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;

            if ($user['role'] === 'admin') {
                echo "<script type='text/javascript'>
                    alert('login berhasil.');
                    location.href = 'tampilanAdmin/tampilanAdmin.php';
                    </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert('login berhasil.');
                    location.href = 'tampilanUser/tampilanUser.php';
                    </script>";
            }
            exit;
        } else {
            $error = "<script>
        alert('Password yang anda masukan salah');
        </script>";
        }
    } else {
        $error = "<script>
        alert('Email tidak ditemukan');
        </script>";
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

    <!-- Login Section -->
    <section class="d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000"">
                <div class="col-md-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <?php if (isset($error)): ?>
                        <p style="color: red;"><?= $error; ?></p>
                    <?php endif; ?>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Masukan Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </form>
                    <p class="text-center mt-3">Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>