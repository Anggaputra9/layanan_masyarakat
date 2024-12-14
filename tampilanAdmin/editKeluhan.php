<?php
include "../koneksi.php";

// Ambil data berdasarkan ID
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM keluhan WHERE id='$id'");
$d = mysqli_fetch_array($data);

// Validasi jika data tidak ditemukan
if (!$d) {
    echo "Data tidak ditemukan!";
    exit();
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];
    $keluhan = $_POST['keluhan'];
    $status = $_POST['status'];

    // Update data di database
    mysqli_query($koneksi, "UPDATE keluhan SET nama='$nama', subjek='$subjek', keluhan='$keluhan', status='$status' WHERE id='$id'");
    header("Location: riwayatAdmin.php"); // Redirect setelah update
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
    
</head>

<body>
    <section class="container my-5">
        <h3>Edit Keluhan</h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($d['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="subjek" class="form-label">Subjek</label>
                <input type="text" class="form-control" id="subjek" name="subjek" value="<?php echo htmlspecialchars($d['subjek']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="5" required><?php echo htmlspecialchars($d['keluhan']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Diajukan" <?php if ($d['status'] == 'Diajukan') echo 'selected'; ?>>Diajukan</option>
                    <option value="Diproses" <?php if ($d['status'] == 'Diproses') echo 'selected'; ?>>Diproses</option>
                    <option value="Selesai" <?php if ($d['status'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                    <option value="Ditolak" <?php if ($d['status'] == 'Ditolak') echo 'selected'; ?>>Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </section>
</body>

</html>
