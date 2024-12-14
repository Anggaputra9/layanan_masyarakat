<?php

include "koneksiAdmin.php";

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// data keluhan
$data = mysqli_query($koneksi, "SELECT * FROM keluhan");
$no = 1; // Mulai nomor increment
$last_no = 0; // Variabel untuk menyimpan nomor terakhir

while ($d = mysqli_fetch_array($data)) {
    $last_no = $no; // Update nomor terakhir sebelum increment
    $no++; // Increment
}


// data laporan masalah 
$data = mysqli_query($koneksi, "SELECT * FROM masalah");
$no = 1; // Mulai nomor increment
$last_nom = 0; // Variabel untuk menyimpan nomor terakhir

while ($d = mysqli_fetch_array($data)) {
    $last_nom = $no; // Update nomor terakhir sebelum increment
    $no++; // Increment
}

// data konsultasi 
$data = mysqli_query($koneksi, "SELECT * FROM konsultasi");
$no = 1; // Mulai nomor increment
$last_nok = 0; // Variabel untuk menyimpan nomor terakhir

while ($d = mysqli_fetch_array($data)) {
    $last_nok = $no; // Update nomor terakhir sebelum increment
    $no++; // Increment
}

// data kritik saran 
$data = mysqli_query($koneksi, "SELECT * FROM contact");
$no = 1; // Mulai nomor increment
$last_nos = 0; // Variabel untuk menyimpan nomor terakhir

while ($d = mysqli_fetch_array($data)) {
    $last_nos = $no; // Update nomor terakhir sebelum increment
    $no++; // Increment
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
    <style>
        .logo-navbar-y {
            height: 100%;
            /* Pastikan gambar mengikuti tinggi navbar */
            max-height: 200px;
            /* Atur maksimal tinggi untuk menjaga proporsional */
            width: auto;
            /* Biarkan lebar menyesuaikan secara otomatis */
            object-fit: contain;
            /* Pastikan gambar tidak terdistorsi */
            border-radius: 20px;
            /* Opsional, untuk sudut melengkung */
            transition: transform 0.3s ease, filter 0.3s ease;
            /* Animasi pada hover */
        }

        .logo-navbar-y:hover {
            transform: translateY(-10px);
            /* Gambar bergerak ke atas */
        }

        .bg-image {
            position: relative;
            min-height: 100vh;
            /* Pastikan body memenuhi layar penuh */
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Hindari scrolling tak terduga */
            box-shadow: 0px 3px 6px rgb(0, 0, 0 , 0.1);
        }

        .bg-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url(../image/bg-admin.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            /* Opacity hanya untuk background */
            z-index: -1;
            /* Pastikan latar belakang berada di belakang konten */
            background-attachment: fixed; /* Membuat background tidak ikut scroll */
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <?php include "navbarAdmin.php"; ?>

    <main class="bg-image">
        <div class="container py-5">
            <section class="hero d-flex align-items-center text-center">
                <div class="container" data-aos="fade-up" data-aos-duration="1000">
                    <img src="../image/iconPM.png" alt="logo" class="logo-navbar-y">
                    <h1>Selamat Datang <br> <span style="font-weight: 600;">Admin Pelayanan Masyarakat</span></h1>
                </div>
            </section>
            <div class="row justify-content-center ">
                <div class="card text-bg-success m-2" style="max-width: 17rem;" data-aos="fade-up" data-aos-duration="1000">
                    <center>
                        <div class="card-header text-white">Data Keluhan</div>
                        <h1 style="color: white;"><?php echo $last_no; ?></h1>
                    </center>
                </div>
                <div class="card text-bg-primary m-2" style="max-width: 17rem;" data-aos="fade-up" data-aos-duration="1000">
                    <center>
                        <div class="card-header text-white">Data Masalah</div>
                        <h1 style="color: white;"><?php echo $last_nom; ?></h1>
                    </center>
                </div>
                <div class="card text-bg-secondary m-2" style="max-width: 17rem;" data-aos="fade-up" data-aos-duration="1000">
                    <center>
                        <div class="card-header text-white">Data Konsultasi</div>
                        <h1 style="color: white;"><?php echo $last_nok; ?></h1>
                    </center>
                </div>
                <div class="card text-bg-danger m-2" style="max-width: 17rem;" data-aos="fade-up" data-aos-duration="1000">
                    <center>
                        <div class="card-header text-white">Kritik dan Saran</div>
                        <h1 style="color: white;"><?php echo $last_nos; ?></h1>
                    </center>
                </div>
            </div>
    </main>
    <div class="container m-auto mt-5" style="background-color: white; border-radius:10px; box-shadow: 0px 4px 8px rgb(0, 0, 0 , 0.2); "  data-aos="fade-up" data-aos-duration="1000">
        <h3 class="mb-3">Statistik Data</h3>
        <div class="row">
            <!-- Chart 1 -->
            <div class="col-md-6">
                <canvas id="chartBar" width="400" height="200"></canvas>
            </div>
            <!-- Chart 2 -->
            <div class="col-md-6">
                <canvas id="chartLine" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    </div>





    <!-- Script Chart.js -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar Chart
            const ctxBar = document.getElementById('chartBar').getContext('2d');
            const chartBar = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Keluhan', 'Masalah', 'Konsultasi', 'Kritik/Saran'],
                    datasets: [{
                        label: 'Jumlah Data',
                        data: [
                            <?php echo $last_no ?: 0; ?>,
                            <?php echo $last_nom ?: 0; ?>,
                            <?php echo $last_nok ?: 0; ?>,
                            <?php echo $last_nos ?: 0; ?>
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(201, 203, 207, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Line Chart
            const ctxLine = document.getElementById('chartLine').getContext('2d');
            const chartLine = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['Keluhan', 'Masalah', 'Konsultasi', 'Kritik/Saran'],
                    datasets: [{
                        label: 'Jumlah Data',
                        data: [
                            <?php echo $last_no ?: 0; ?>,
                            <?php echo $last_nom ?: 0; ?>,
                            <?php echo $last_nok ?: 0; ?>,
                            <?php echo $last_nos ?: 0; ?>
                        ],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>




    <!-- Footer -->
    <?php include "footerAdmin.php"; ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>