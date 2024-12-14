<?php
include "koneksiUser.php";
function getStatusClass($status)
{
    switch ($status) {
        case 'diajukan':
            return 'badge bg-primary'; // Warna biru
        case 'diproses':
            return 'badge bg-warning'; // Warna kuning
        case 'selesai':
            return 'badge bg-success'; // Warna hijau
        case 'ditolak':
            return 'badge bg-danger'; // Warna merah
        default:
            return 'badge bg-secondary'; // Default abu-abu
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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
    <!-- navbar -->
    <?php include "navbarUser.php"; ?>

    <section class="container mt-4">
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-12">
                <h3 >1. Data Keluhan</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM keluhan ORDER BY waktu DESC");
                            $no = 1;
                            if (mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo htmlspecialchars($d['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['subjek'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['keluhan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                        <span class="<?php echo getStatusClass($d['status']); ?>">
                                            <?php echo htmlspecialchars($d['status'], ENT_QUOTES, 'UTF-8'); ?>
                                        </span>
                                    </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center">Data tidak tersedia</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-4">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>2. Data Laporan Masalah</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Masalah</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM masalah ORDER BY waktu DESC");
                            $no = 1;
                            if (mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo htmlspecialchars($d['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['masalah'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['tempat'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['waktu'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center">Data tidak tersedia</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-4 mb-4">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>3. Konsultasi Publik</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Konsultasi</th>
                                <th scope="col">Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM konsultasi ORDER BY waktu DESC");
                            $no = 1;
                            if (mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++; ?></th>
                                        <td><?php echo htmlspecialchars($d['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['konsultasi'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($d['tanggapan'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="4" class="text-center">Data tidak tersedia</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include "footerUser.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
