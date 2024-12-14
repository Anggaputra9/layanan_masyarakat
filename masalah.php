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
    $masalah = $_POST ['masalah'];
    $tempat = $_POST ['tempat'];
    $waktu = $_POST ['waktu'];

    $query = "INSERT into masalah (nama,masalah,tempat,waktu) VALUES ('$nama','$masalah','$tempat','$waktu')";
    if (mysqli_query($koneksi,$query)){
        echo "<script>
        alert('Terimakasih telah melaporkan masalah! barangakali admin sedang off silahkan hubungi langsung nomor 0882-9828-3728');
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
                <h3>Formulir Masalah</h3>
                <form action="masalah.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="masalah" class="form-label">Masalah</label>
                        <input type="text" class="form-control" id="masalah" name="masalah" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
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