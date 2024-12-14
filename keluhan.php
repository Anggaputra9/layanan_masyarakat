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
    $subjek = $_POST ['subject'];
    $keluhan = $_POST ['keluhan'];

    $query = "INSERT into keluhan ( nama, subjek, keluhan) VALUES ('$nama','$subjek','$keluhan')";
    if (mysqli_query($koneksi,$query)){
        echo "<script>
        alert('Keluhan anda akan segera kami atasi, silahkan cek riwayat keluhan anda');
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
                <h3>Formulir Keluhan</h3>
                <form action="keluhan.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan</label>
                        <textarea class="form-control" id="keluhan" name="keluhan" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footer.php"; ?>
    
</body>

</html>