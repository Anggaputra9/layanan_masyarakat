<?php
include "koneksiAdmin.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = $_POST['message'];

    $query = "INSERT into contact ( nama, email, subjek, pesan) VALUES ('$nama','$email','$subjek','$pesan')";
    if (mysqli_query($koneksi, $query)) {
        echo "data berhasil ditambahkan";
    } else {
        echo "error : " . $query . "br" . mysqli_error($koneksi);
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
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include "navbarAdmin.php"; ?>

    <section class="container my-5">
        <div class="row mb-5">
            <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                <h3>Laporan Kritik dan Saran</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-5">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM contact");
                            $no = 1; // Untuk menampilkan nomor urut jika ID tidak auto-increment
                            while ($d = mysqli_fetch_array($data)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo htmlspecialchars($d['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($d['email']); ?></td>
                                    <td><?php echo htmlspecialchars($d['subjek']); ?></td>
                                    <td><?php echo htmlspecialchars($d['pesan']); ?></td>
                                </tr>
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