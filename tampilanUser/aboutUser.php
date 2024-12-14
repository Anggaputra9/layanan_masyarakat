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


    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center" data-aos="fade-up" data-aos-duration="1000">Tentang Layanan Pengaduan Masyarakat</h1>
            <p class="lead text-center mb-5" data-aos="fade-up" data-aos-duration="1000">Layanan pengaduan masyarakat adalah sebuah platform yang dirancang untuk memfasilitasi warga dalam melaporkan permasalahan publik sekaligus menyampaikan aspirasi mereka kepada pihak berwenang.</p>

            <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Tujuan Layanan</h2>
            <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Platform ini bertujuan menyediakan jalur komunikasi yang mudah diakses oleh masyarakat untuk melaporkan berbagai persoalan, seperti layanan publik, infrastruktur, masalah lingkungan, dan isu-isu lainnya. Kami berkomitmen memastikan setiap pengaduan dikelola secara cepat, terbuka, dan tepat oleh pihak yang bertanggung jawab.</p>

            <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Visi dan Misi</h2>

            <h3 data-aos="fade-up" data-aos-duration="1000">Visi</h3>
            <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Membangun hubungan yang kuat dan efektif antara masyarakat serta pemerintah demi terciptanya lingkungan yang aman, nyaman, dan terkelola dengan baik.</p>

            <h3 data-aos="fade-up" data-aos-duration="1000">Misi</h3>
            <ul data-aos="fade-up" data-aos-duration="1000">
                <li>Memberikan akses yang praktis dan cepat bagi masyarakat untuk menyampaikan keluhan dan aspirasi.</li>
                <li>Menjamin transparansi serta akuntabilitas dalam setiap langkah penanganan pengaduan.</li>
                <li>Menumbuhkan kepercayaan masyarakat terhadap layanan publik melalui proses yang adil dan responsif.</li>
                <li>Meningkatkan mutu pelayanan publik dengan memanfaatkan masukan dan keluhan dari warga</li>
            </ul>

            <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Cara Kerja Layanan Pengaduan</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Layanan pengaduan masyarakat dapat diakses melalui beberapa tahapan berikut:</p>
            <ol data-aos="fade-up" data-aos-duration="1000">
                <li>Pengajuan Pengaduan: Masyarakat mengisi formulir pengaduan yang tersedia di website, mencakup informasi lengkap mengenai masalah yang dihadapi.</li>
                <li>Verifikasi: Tim akan memeriksa keluhan untuk memastikan data relevan dan akurat.</li>
                <li>Tindak Lanjut: Keluhan diteruskan ke pihak berwenang yang bertanggung jawab untuk ditangani.</li>
                <li>Pemantauan Status: Masyarakat dapat memantau perkembangan pengaduan mereka secara real-time melalui platform yang tersedia.</li>
            </ol>

            <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Komitmen Kami</h2>
            <p class="text-justify" data-aos="fade-up" data-aos-duration="1000">Kami berkomitmen untuk memberikan pelayanan yang transparan, akuntabel, dan responsif terhadap setiap pengaduan yang disampaikan oleh masyarakat. Dengan demikian, kami berharap dapat menciptakan lingkungan yang lebih baik melalui partisipasi
                aktif dari masyarakat.</p>

            <div class="text-center mt-5">
                <a href="contact.php" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000">Hubungi Kami</a>
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