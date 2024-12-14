<?php
include "koneksiUser.php";

if (isset($_POST['submit'])) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subject'];
    $pesan = $_POST['message'];

    $query = "INSERT into contact ( nama, email, subjek, pesan) VALUES ('$nama','$email','$subjek','$pesan')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
        alert('data berhasil ditambahkan!');
        </script>";
    } else {
        echo "error : " . $query . "br" . mysqli_error($koneksi);
    }
}
?>

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
</head>

<body>

    <!-- Navbar -->
    <?php include "navbarUser.php"; ?>


    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-4" data-aos="fade-up" data-aos-duration="1000" >Hubungi Kami</h1>
            <p class="lead text-center" data-aos="fade-up" data-aos-duration="1000">Silakan gunakan formulir di bawah ini untuk menghubungi kami mengenai pertanyaan atau laporan keluhan terkait layanan publik.</p>

            <div class="row mt-5">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <h3 data-aos="fade-up" data-aos-duration="1000">Formulir Kontak</h3>
                    <form action="contact.php" method="POST">
                        <div class="mb-3" data-aos="fade-up" data-aos-duration="1000">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-duration="1000">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-duration="1000">
                            <label for="subject" class="form-label">Subjek</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3" data-aos="fade-up" data-aos-duration="1000">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000">Kirim Pesan</button>
                    </form><br><br>
                </div>

                <!-- Contact Information -->
                <div class="col-md-6">
                    <h3 data-aos="fade-up" data-aos-duration="1000">Informasi Kontak</h3>
                    <p data-aos="fade-up" data-aos-duration="1000">Anda juga dapat menghubungi kami melalui informasi kontak di bawah ini:</p>
                    <ul class="list-unstyled">
                        <table cellpadding="5px" data-aos="fade-up" data-aos-duration="1000">
                            <li><tr>
                                <td><label for=""><strong>Alamat</strong></label></td>
                                <td>: Bojonggintung RT 1 RW 5 Cimanggu Cilacap</td>
                            </tr></li>
                            <li><tr>
                                <td><label for=""><strong>Telepon</strong></label></td>
                                <td>: 0882-98283728</td>
                            </tr></li>
                            <li><tr>
                                <td><label for=""><strong>Email</strong></label></td>
                                <td>: 234110601050@mhs.uinsaizu.ac.id</td>
                            </tr></li>
                            <li><tr>
                                <td><label for=""><strong>Jam Operasional</strong>&nbsp</label></td>
                                <td>: Senin - Jumat, 08:00 - 16:00 WIB</td>
                            </tr></li>
                        </table>
                    </ul>
                    <h4 data-aos="fade-up" data-aos-duration="1000">Ikuti Kami</h4>
                    <a href="https://www.instagram.com/prtama.ap_/" class="me-2"><img src="../image/instagram.png" alt="Instagram" width="30" data-aos="fade-up" data-aos-duration="1000"></a>
                    <a href="https://www.facebook.com" class="me-2"><img src="../image/facebook.png" alt="Facebook" width="30" data-aos="fade-up" data-aos-duration="1000"></a>
                    <a href="https://l.instagram.com/?u=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fangga-putra-pratama-75376a2b4%3Futm_source%3Dshare%26utm_campaign%3Dshare_via%26utm_content%3Dprofile%26utm_medium%3Dandroid_app%26fbclid%3DPAZXh0bgNhZW0CMTEAAaZp4pKdVjlSBrsZ49di0Gk3l4VxaROtpxa3ChnUGAqABhB-25NaxopC0qw_aem_N2lJ0UL9it4sfM08skmKRw&e=AT3pcqd72wE5rY7vTPHXWTtjY2FVR5DvwMV1kHNGJ-RLiWT7yxjKZFCd9Drob8ff6qOmio615yclTUi8tw6fu8iUYK5feHjyXinClAQ" class="me-2" ><img src="../image/linkedin.png" alt="Linkedin" width="30" data-aos="fade-up" data-aos-duration="1000"></a>
                    
                </div>
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