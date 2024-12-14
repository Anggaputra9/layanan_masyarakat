<?php
include "koneksiUser.php";

$query = "SELECT * FROM artikel ORDER BY created_at DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbarUser.php"; ?>



    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000">Berita Terbaru</h1>
            <p class="lead text-center" data-aos="fade-up" data-aos-duration="1000">Dapatkan informasi terbaru tentang pelayanan publik, program pemerintah, dan berita terkini lainnya.</p>

            <div class="container mt-5">
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
            </div>

       
        </div>
    </section>

    <!-- Footer -->
    <?php include "footerUser.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>


</html>