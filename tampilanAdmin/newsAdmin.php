<?php
include "koneksiAdmin.php";

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
    <?php include "navbarAdmin.php"; ?>



    <!-- News Section -->
    <section class="py-5">
        <div class="container">
            <div class="header-container" style="display:flex; align-items: center; justify-content: center; ">
                <h1 style="margin:0;" data-aos="fade-up" data-aos-duration="1000">Kelola Artikel</h1>
                <div class="nav-item dropdown">
                    <button class="btn btn-primary" style="margin-left: 15px;" data-aos="fade-up" data-aos-duration="1000">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tambahArtikel.php">Tambah Artikel</a></li>
                            <li><a class="dropdown-item" href="editArtikel.php" data-bs-toggle="modal" data-bs-target="#editModal">Edit Artikel</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="hapusArtikel.php" data-bs-toggle="modal" data-bs-target="#hapusModal">Hapus Artikel</a></li>
                        </ul>
                    </button>
                </div>
            </div>

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
                                        <a href="../uploads/artikel/<?php echo htmlspecialchars($row['file_path'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary" target="_blank"> Selengkapnya</a>
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

    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Pilih Artikel untuk Diedit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <?php
                        // Ambil daftar artikel dari database
                        $query = "SELECT id, judul FROM artikel ORDER BY created_at DESC";
                        $result = mysqli_query($koneksi, $query);

                        // Loop artikel untuk membuat daftar
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="list-group-item">
                                <a href="editArtikel.php?id=' . $row['id'] . '" class="btn btn-link">' . htmlspecialchars($row['judul']) . '</a>
                              </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal hapus-->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Pilih Artikel untuk diHapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <?php
                        // Ambil daftar artikel dari database
                        $query = "SELECT id, judul FROM artikel ORDER BY created_at DESC";
                        $result = mysqli_query($koneksi, $query);

                        // Loop artikel untuk membuat daftar
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<li class="list-group-item">
                                <a href="hapusArtikel.php?id=' . $row['id'] . '" class="btn btn-link">' . htmlspecialchars($row['judul']) . '</a>
                              </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include "footerAdmin.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>