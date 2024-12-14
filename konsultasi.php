<?php
include "koneksi.php";


session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>
        alert('Anda harus login untuk mengakses fitur ini!');
        window.location.href = 'login.php';
    </script>";
    exit;
}



if (isset($_POST['submit'])){
    $nama = $_POST ['name'];
    $konsultasi = $_POST ['konsultasi'];

    $query = "INSERT into konsultasi( nama, konsultasi) VALUES ('$nama','$konsultasi')";
    if (mysqli_query($koneksi,$query)){
        echo "<script>
        alert('Pesan anda telah tersampaikan, silahkan cek riwayat untuk menunggu admin membalas pesan anda');
        window.location.href = 'services.php';
        </script>";
    }else{
        echo "error : ". $query . "br" . mysqli_error($koneksi);
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
    <link href="style.css" rel="stylesheet">
    <link rel="icon" href="image/logoNavbar.png" type="image/x-icon">
</head>
<body>
<section class="container">
        <div class="row mt-5">
            <div class="col-md-10">
                <h3>Konsultasi</h3>
                <form action="konsultasi.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="konsultasi" class="form-label">Konsultasi</label>
                        <textarea class="form-control" id="konsultasi" name="konsultasi" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </section>

    <!-- footer  -->
     <?php include "footer.php"; ?>
</body>
</html>