<?php
include "koneksiAdmin.php"; // Koneksi database

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    // Upload gambar
    $image_path = $_FILES['gambar']['name'];
    $target_dir = "../uploads/gambar/";
    $target_image = $target_dir . basename($image_path);
    
    // Upload file artikel
    $file_path = $_FILES['file']['name'];
    $target_file = "../uploads/artikel/" . basename($file_path);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_image) &&
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        // Insert ke database
        $query = "INSERT INTO artikel (judul, deskripsi, file_path, image_path) VALUES ('$judul', '$deskripsi', '$file_path', '$image_path')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
        alert('Artikel berhasil ditambahkan!');
        window.location.href = 'newsAdmin.php';
        </script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah file atau gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Artikel Baru</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Upload File Artikel</label>
            <input type="file" class="form-control" name="file" id="file" accept=".pdf,.doc,.docx" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Artikel</button>
    </form>
</div>
</body>
</html>
