<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['user']['role'] !== 'user') {
    header("Location: ../tampilanAdmin/tampilanAdmin.php");
    exit;
}

?>

<?php
include "koneksiUser.php";

$query = "SELECT * FROM artikel ORDER BY created_at DESC LIMIT 3";
$result = mysqli_query($koneksi, $query);
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
    <style>
        .logo-navbar-y {
            height: 100%;
            /* Pastikan gambar mengikuti tinggi navbar */
            max-height: 200px;
            /* Atur maksimal tinggi untuk menjaga proporsional */
            width: auto;
            /* Biarkan lebar menyesuaikan secara otomatis */
            object-fit: contain;
            /* Pastikan gambar tidak terdistorsi */
            border-radius: 20px;
            /* Opsional, untuk sudut melengkung */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Animasi pada hover */
        }

        .logo-navbar-y:hover {
            transform: translateY(-10px);
            /* Gambar bergerak ke atas */
        }

        .bg-image {
            position: relative;
            min-height: 100vh;
            /* Pastikan body memenuhi layar penuh */
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Hindari scrolling tak terduga */
            box-shadow: 0px 3px 6px rgb(0, 0, 0, 0.1);
        }

        .bg-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(../image/konsultasi.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            /* Opacity hanya untuk background */
            z-index: -1;
            /* Pastikan latar belakang berada di belakang konten */
            background-attachment: fixed;
            /* Membuat background tidak ikut scroll */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include "navbarUser.php"; ?>

    <!-- Hero Section -->
    <div class="bg-image">
        <section class="hero d-flex align-items-center text-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="container mt-5">
                <img src="../image/iconPM.png" alt="logo" class="logo-navbar-y">
                <h1>Selamat Datang di Layanan Pengaduan Masyarakat</h1>
                <p class="lead">Menyediakan solusi cepat dan mudah untuk keluhan dan masukan Anda. Layanan pengaduan masyarakat adalah sebuah platform yang dirancang untuk memfasilitasi warga dalam melaporkan permasalahan publik sekaligus menyampaikan seluruh aspirasi kepada pihak berwenang.</p>
            </div>
        </section>
    </div>

    <!-- Services Section -->
    <section class="container py-5">
        <h2 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000">Layanan Kami</h2>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="card">
                    <img src="../image/keluhan.png" class="card-img-top" alt="Pengaduan Cepat">
                    <div class="card-body">
                        <h5 class="card-title">Pengaduan Cepat</h5>
                        <p class="card-text">Layanan untuk menyampaikan keluhan Anda secara cepat dan akurat.</p>
                        <a href="services.html" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="card">
                    <img src="../image/masalah.png" class="card-img-top" alt="Pelaporan Masalah">
                    <div class="card-body">
                        <h5 class="card-title">Pelaporan Masalah</h5>
                        <p class="card-text">Layanan untuk melaporkan masalah secara efisien dengan tindak lanjut tepat waktu.</p>
                        <a href="services.html" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="card">
                    <img src="../image/konsultasi.png" class="card-img-top" alt="Layanan Konsultasi">
                    <div class="card-body">
                        <h5 class="card-title">Layanan Konsultasi</h5>
                        <p class="card-text">Menyediakan konsultasi untuk membantu masyarakat mendapatkan solusi.</p>
                        <a href="services.html" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000">Berita Terkini</h2>

            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card mb-4">
                                <img src="../uploads/gambar/<?php echo htmlspecialchars($row['image_path'], ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="Gambar Artikel">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <p class="card-text"><?php echo substr(htmlspecialchars($row['deskripsi'], ENT_QUOTES, 'UTF-8'), 0, 100); ?>...</p>
                                    <a href="../uploads/artikel/<?php echo htmlspecialchars($row['file_path'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Belum ada artikel.</p>";
                }
                ?>
            </div>

            <div class="text-center mt-5">
                <a href="newsUser.php" class="btn btn-outline-primary" data-aos="fade-up" data-aos-duration="1000">Lihat Berita Lainnya</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footerUser.php"; ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>