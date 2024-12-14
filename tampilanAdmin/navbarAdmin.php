<?php
// Tentukan halaman aktif berdasarkan URL
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        .nav-link.active {
            position: relative;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1%;
            background-color: white !important;
            /* Pastikan garis bawah terlihat */
            z-index: 1;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="container">
            <img src="../image/logoNavbar.png" alt="logo" class="logo-navbar" style="max-height: 25px;">
            <a class="navbar-brand" href="#">Admin PM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'tampilanAdmin.php') ? 'active' : ''; ?>" href="tampilanAdmin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'riwayatAdmin.php') ? 'active' : ''; ?>" href="riwayatAdmin.php">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'newsAdmin.php') ? 'active' : ''; ?>" href="newsAdmin.php">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'contactAdmin.php') ? 'active' : ''; ?>" href="contactAdmin.php">Saran</a>
                    </li>
                    <li class="nav-item" onclick="return confirm('Anda yakin ingin Logout?')"><a class="nav-link" href="logoutAdmin.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>