<?php
include "koneksiAdmin.php"; // Koneksi database

// Pastikan ID artikel ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data artikel berdasarkan ID untuk mengetahui path gambar dan file yang perlu dihapus
    $query = "SELECT * FROM artikel WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_path = $row['image_path'];
        $file_path = $row['file_path'];

        // Hapus artikel dari database
        $query_delete = "DELETE FROM artikel WHERE id = $id";
        if (mysqli_query($koneksi, $query_delete)) {
            // Hapus gambar jika ada
            if (file_exists("../uploads/gambar/$image_path")) {
                unlink("../uploads/gambar/$image_path");
            }

            // Hapus file artikel jika ada
            if (file_exists("../uploads/artikel/$file_path")) {
                unlink("../uploads/artikel/$file_path");
            }

            // Redirect setelah sukses menghapus
            echo "<script>
                    alert('Artikel berhasil dihapus!');
                    window.location.href = 'newsAdmin.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Artikel tidak ditemukan.";
    }
} else {
    echo "ID artikel tidak ditemukan.";
}
?>
