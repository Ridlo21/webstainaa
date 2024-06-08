<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta property="og:image" content="<?php echo base_url(); ?>asset_web/thumbnail.jpg" />

    <title>STAINAA </title>
    </script>

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>asset_web/stainaa.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>asset_web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset_web/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>asset_web/css/style.css" rel="stylesheet">
    <style>
        #topbar {
            background: #06ba5a !important;
        }

        #topbar .contact-info i {
            color: #f8f6f5 !important;
            padding: 4px;
        }

        #topbar .social-links a {
            color: #f8f6f5 !important;
            padding: 4px 0 4px 20px;
            display: inline-block;
            line-height: 1px;
            transition: 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu .active>a,
        .nav-menu li:hover>a {
            color: #06ba5a !important;
            text-decoration: none;
        }

        .cta h3 span {
            color: #06ba5a !important;
        }

        .back-to-top {
            position: fixed;
            display: none;
            width: 40px;
            height: 40px;
            border-radius: 3px;
            right: 15px;
            bottom: 15px;
            background: #06ba5a !important;
            color: #fff;
            transition: display 0.5s ease-in-out;
            z-index: 99999;
        }
    </style>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHS9Z2X" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
        <meta content="<?php echo base_url(); ?>asset_web/thumbnail.jpg" itemprop="url" />
    </div>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i><a href="#" class="text-white">stainaa@staina.ac.id</a>
                <i class="icofont-phone"></i> <a class="text-white">087788774396 - 081394939265</a>
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/STAINurulAbrorAlRobbaniyin" target="_blank" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/stai.naa/" target="_blank" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCTU_VO7xlqd_MIdgWBWtm-A" target="_blank" class="youtube"><i class="icofont-youtube"></i></i></a>
                <a href="https://wa.me/+6287788774396" target="_blank" class="whatsapp"><i class="icofont-whatsapp"></i></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex">

            <div class="logo mr-auto image">
                <!--<h1 class="text-light"><a href=""><img src=""></a></h1>-->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="<?= base_url() ?>utama/"><img src="<?= base_url() ?>asset_web/web1.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li <?= $this->uri->segment(2) == ""  ? "class='nav-link active'" : "class='nav-link'" ?>>
                        <a href="<?= base_url() ?>utama/">Beranda</a>
                    </li>
                    <li <?= $this->uri->segment(2) == "tentang"  ? "class='nav-link active'" : "class='nav-link'" ?>>
                        <a href="<?= base_url() ?>utama/tentang">Tentang</a>
                    </li>
                    <!-- <li <?= $this->uri->segment(2) == "pendidikan"  ? "class='nav-link active'" : "class='nav-link'" ?>>
                        <a href="<?= base_url() ?>utama/pendidikan">Pendidikan</a>
                    </li> -->
                    <li <?= $this->uri->segment(2) == "PAI" || $this->uri->segment(2) == "HES" ? "class='drop-down nav-link active'" : "class='drop-down nav-link'" ?>><a href="#">Pendidikan</a>
                        <ul>
                            <li> <a href="<?= base_url() ?>utama/PAI">PAI</a></li>
                            <li> <a href="<?= base_url() ?>utama/HES">HES</a></li>
                        </ul>
                    </li>
                    <li <?= $this->uri->segment(2) == "kemahasiswaan"  ? "class='nav-link active'" : "class='nav-link'" ?>>
                        <a href="<?= base_url() ?>utama/kemahasiswaan">Kemahasiswaan</a>
                    </li>
                    <li <?= $this->uri->segment(1) == "artikel"  ? "class='drop-down nav-link active'" : "class='drop-down nav-link'" ?>>
                        <a href="#">Artikel</a>
                        <ul>
                            <li> <a href="<?= base_url() ?>artikel/artikel_all/HIMASTA">HIMASTA</a></li>
                            <li> <a href="<?= base_url() ?>artikel/artikel_all/HIMASYA">HIMASYA</a></li>
                        </ul>
                    </li>
                    <li <?= $this->uri->segment(1) == "akreditasi"  ? "class='drop-down nav-link active'" : "class='drop-down nav-link'" ?>>
                        <a href="#">Artikel</a>
                        <ul>
                            <li> <a href="<?= base_url() ?>akreditasi/akreditasi_all/APT">APT</a></li>
                            <li> <a href="<?= base_url() ?>akreditasi/akreditasi_all/PAI">PAI</a></li>
                            <li> <a href="<?= base_url() ?>akreditasi/akreditasi_all/HES">HES</a></li>
                        </ul>
                    </li>
                    <li <?= $this->uri->segment(2) == "pendaftaran"  ? "class='nav-link active'" : "class='nav-link'" ?>>
                        <a href="https://pmb.stainaa.ac.id">Pendaftaran</a>
                    </li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
    <!-- <?php
            $me = $this->db->from('idn')->where_not_in('nama', 'stainaa')->get();
            $menu = $me->result_array();
            foreach ($menu as $mn) {
            ?>
        <li> <a href="<?= base_url() ?>utama/<?= $mn['nama'] ?>/<?= $mn['id_idn'] ?>"><?= $mn['nama'] ?></a></li>
    <?php
            }
    ?> -->