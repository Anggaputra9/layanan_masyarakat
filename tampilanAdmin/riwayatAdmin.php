<?php
include "../koneksi.php";

// Fungsi Delete keluhan
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysqli_query($koneksi, "DELETE FROM keluhan WHERE id='$delete_id'");
    header("Location: riwayatAdmin.php"); // Redirect setelah delete
    exit();
}

// Logika untuk menyimpan tanggapan
if (isset($_POST['submit_tanggapan'])) {
    $id = $_POST['id'];
    $tanggapan = $_POST['tanggapan'];

    // Update tanggapan ke database
    $updateQuery = "UPDATE konsultasi SET tanggapan = '$tanggapan' WHERE id = '$id'";
    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: riwayatAdmin.php"); // Redirect ke halaman utama
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}


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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <?php include "navbarAdmin.php"; ?>

    <section class="container my-5">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>1. Data Keluhan</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM keluhan ORDER BY waktu DESC");
                            $no = 1; // Untuk menampilkan nomor urut jika ID tidak auto-increment
                            while ($d = mysqli_fetch_array($data)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($d['subjek']); ?></td>
                                    <td><?php echo htmlspecialchars($d['keluhan']); ?></td>
                                    <td>
                                        <span class="<?php echo getStatusClass($d['status']); ?>">
                                            <?php echo htmlspecialchars($d['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="editKeluhan.php?id=<?php echo $d['id']; ?>" class="btn btn-success btn-sm m-1">Edit</a>
                                        <a href="?delete_id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm " onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>2. Data Laporan Masalah</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
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
                            while ($d = mysqli_fetch_array($data)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($d['masalah']); ?></td>
                                    <td><?php echo htmlspecialchars($d['tempat']); ?></td>
                                    <td><?php echo htmlspecialchars($d['waktu']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>3. Konsultasi Publik</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Konsultasi</th>
                                <th scope="col">Tanggapan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM konsultasi ORDER BY waktu DESC");
                            $no = 1;
                            while ($d = mysqli_fetch_array($data)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($d['konsultasi']); ?></td>
                                    <td><?php echo htmlspecialchars($d['tanggapan']); ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#tanggapanModal<?php echo $d['id']; ?>">Tanggapi</button>
                                    </td>
                                </tr>
                                <!-- Modal Form Tanggapan -->
                                <div class="modal fade" id="tanggapanModal<?php echo $d['id']; ?>" tabindex="-1" aria-labelledby="tanggapanModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tanggapanModalLabel">Tanggapi Konsultasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="tanggapan" class="form-label">Tanggapan</label>
                                                        <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" required><?php echo htmlspecialchars($d['tanggapan']); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit_tanggapan" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <?php include "footerAdmin.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>