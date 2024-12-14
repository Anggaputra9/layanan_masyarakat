<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="../image/logoNavbar.png" type="image/x-icon">
    <style>
        .text-justify{
            text-align: justify;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php include "navbarUser.php"; ?>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000">Layanan Pengaduan Masyarakat</h1>
            <p class="lead text-center" data-aos="fade-up" data-aos-duration="1000">Kami menyediakan berbagai layanan untuk membantu masyarakat dalam melaporkan keluhan dan mendapatkan solusi terbaik atas masalah yang dihadapi.</p>

            <div class="row mt-5">
                <!-- Layanan Pengajuan Keluhan -->
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pengajuan Keluhan</h5>
                            <p class="card-text">Laporkan keluhan mengenai layanan publik, infrastruktur, atau masalah sosial secara online dengan cepat dan mudah.</p>
                            <a href="#keluhan" class="btn btn-primary mt-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>
              
                <!-- Pelaporan Masalah -->
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pelaporan Masalah</h5>
                            <p class="card-text">Pelaporan Masalah adalah proses mendokumentasikan dan melaporkan suatu isu atau kendala yang ditemukan.</p>
                            <a href="#pelaporanmasalah" class="btn btn-primary mt-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                  <!-- Layanan Konsultasi Publik -->
                  <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Konsultasi Publik</h5>
                            <p class="card-text">Dapatkan panduan dan konsultasi dari petugas untuk solusi dan arahan mengenai layanan yang Anda butuhkan.</p>
                            <a href="#konsultasi" class="btn btn-primary mt-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Layanan -->
            <div class="mt-5">
                <h2 id="keluhan" class="mt-4" data-aos="fade-up" data-aos-duration="1000">1. Pengajuan Keluhan</h2>
                <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Layanan ini memungkinkan masyarakat untuk melaporkan berbagai keluhan terkait infrastruktur, fasilitas umum, dan pelayanan pemerintah yang tidak sesuai harapan. Semua laporan akan diverifikasi dan disampaikan kepada pihak berwenang untuk
                    ditindaklanjuti.
                </p>
                <a href="keluhanUser.php" class="btn btn-primary mt-3" data-aos="fade-up" data-aos-duration="1000">Ajukan Keluhan</a>

                <h2 id="pelaporanmasalah" class="mt-4" data-aos="fade-up" data-aos-duration="1000">2. Pelaporan Masalah</h2>
                <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Pelaporan Masalah adalah proses mendokumentasikan dan melaporkan suatu isu atau kendala yang ditemukan dalam sistem, produk, atau layanan untuk memungkinkan perbaikan atau solusi yang tepat. <br><br>
                    Pelaporan ini mencakup deskripsi masalah, langkah-langkah untuk mereproduksi masalah, dampak yang ditimbulkan, dan informasi tambahan seperti waktu kejadian, perangkat yang digunakan, atau pesan kesalahan yang muncul. Tujuan dari pelaporan masalah adalah memberikan informasi yang cukup agar tim terkait dapat menganalisis dan menyelesaikan masalah secara efisien.</p>
                <a href="masalahUser.php" class="btn btn-primary mt-3" data-aos="fade-up" data-aos-duration="1000">Laporkan Masalah</a>

                <h2 id="konsultasi" class="mt-4" data-aos="fade-up" data-aos-duration="1000">3. Konsultasi Publik</h2>
                <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Melalui layanan konsultasi, masyarakat dapat berkonsultasi dengan petugas terkait mengenai peraturan, prosedur, dan layanan publik yang disediakan pemerintah. Tim kami siap membantu memberikan solusi yang terbaik bagi kebutuhan Anda.</p>
                <a href="konsultasiUser.php" class="btn btn-primary mt-3" data-aos="fade-up" data-aos-duration="1000">Konsultasi</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "footerUser.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>