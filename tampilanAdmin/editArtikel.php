<?php
include "koneksiAdmin.php"; // Koneksi database

// Ambil ID artikel dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data artikel berdasarkan ID
    $query = "SELECT * FROM artikel WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    // Jika artikel ditemukan, ambil data
    if ($row = mysqli_fetch_assoc($result)) {
        $judul = $row['judul'];
        $deskripsi = $row['deskripsi'];
        $image_path = $row['image_path'];
        $file_path = $row['file_path'];
    }
}

// Proses Update Artikel
if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // Proses upload gambar baru jika ada
    if (!empty($_FILES['gambar']['name'])) {
        $image_path = $_FILES['gambar']['name'];
        $target_dir = "../uploads/gambar/";
        $target_image = $target_dir . basename($image_path);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target_image);
    }

    // Proses upload file baru jika ada
    if (!empty($_FILES['file']['name'])) {
        $file_path = $_FILES['file']['name'];
        $target_file = "../uploads/artikel/" . basename($file_path);
        move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
    }

    // Update data artikel di database
    $query = "UPDATE artikel SET judul = '$judul', deskripsi = '$deskripsi', file_path = '$file_path', image_path = '$image_path' WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Artikel berhasil diperbarui!'); window.location.href = 'newsAdmin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Artikel</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo htmlspecialchars($judul); ?>" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required><?php echo htmlspecialchars($deskripsi); ?></textarea>
        </div>
        
        <!-- Gambar Artikel -->
        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
            <!-- Menampilkan gambar lama jika ada -->
            <?php if ($image_path): ?>
                <img src="../uploads/gambar/<?php echo htmlspecialchars($image_path); ?>" class="img-thumbnail mt-3" alt="Gambar Artikel" width="200">
            <?php endif; ?>
        </div>
        
        <!-- File Artikel -->
        <div class="mb-3">
            <label for="file" class="form-label">Upload File Artikel</label>
            <input type="file" class="form-control" name="file" id="file" accept=".pdf,.doc,.docx">
            <!-- Menampilkan file lama jika ada -->
            <?php if ($file_path): ?>
                <a href="../uploads/artikel/<?php echo htmlspecialchars($file_path); ?>" class="btn btn-info mt-2" target="_blank">Lihat File Artikel</a>
            <?php endif; ?>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Perbarui Artikel</button>
    </form>
</div>

</body>
</html>
