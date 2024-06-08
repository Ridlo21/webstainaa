<!-- ======= Hero Section ======= -->
<section id="hero" style="height:500px;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <?php
            // $this->db->where('headline', "Y");
            $this->db->order_by('id_photo', 'DESC');
            $this->db->limit(5, 0);
            $this->db->from('slidephoto');
            $slide = $this->db->get()->result_array();
            $no = 0;
            foreach ($slide as $sl) {
                if ($sl["photo"] == "") {
            ?>
                    <div class="carousel-item active" style="background-image: url(<?php echo base_url(); ?>asset/foto_berita/no-image.jpg);">
                    </div>
                <?php
                } else {
                    $no++;
                    if ($no == 1) {
                        $aktif = "active";
                    } else {
                        $aktif = "";
                    }
                ?>
                    <!--<div  >-->
                        <img class="carousel-item <?= $aktif ?>" src="<?php echo base_url(); ?>asset/foto_slide/<?= $sl['photo'] ?>">
                    <!--</div>-->
                <?php
                }
                ?>

            <?php
            }
            ?>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
</section><!-- End Hero -->

<main id="main">
    <section id="cta" class="cta">
        <div class="container">
            <?php
            $this->db->where('id_identitas', "1");
            $this->db->from('identitas');
            $identitas = $this->db->get()->row_array();
            ?>
            <div class="row">
                <div class="col-lg-12 text-center text-lg-left">
                    <h3>STAI <span>NAA</span></h3>
                    <p>
                        <?= $identitas["keterangan"] ?>
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section id="features" class="features mt-5">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>List <strong>Agenda</strong> STAINAA</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->

            </div>
            <?php
            $this->db->from('agenda');
            $this->db->order_by('id_agenda', 'DESC');
            $this->db->limit(3);
            $agendanya = $this->db->get()->result_array();
            ?>
            <div class="row">

                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
                    <ul class="nav nav-tabs flex-column">
                        <?php
                        $no = 0;
                        foreach ($agendanya as $agd) {
                            $no++;
                            if ($no == 1) {
                                $aktif = " active show";
                            } else {
                                $aktif = "";
                            }
                            $isi_agd = (strip_tags($agd['isi_agenda']));
                            $isi = substr($isi_agd, 0, 50);
                            $isi = substr($isi_agd, 0, strrpos($isi, " "));
                            $isi_agendanya = $isi;
                        ?>
                            <li class="nav-item agenda">
                                <a class="nav-link<?= $aktif ?>" data-toggle="tab" href="#tab-<?= $agd['id_agenda'] ?>">
                                    <h4><?= $agd['tema'] ?></h4>
                                    <p><?= $isi_agendanya ?> ...</p>
                                </a>
                                <div class="read-more float-right">
                                    <a href="<?= base_url() ?>agenda/detail/<?= $agd['tema_seo'] ?>">Selengkapnya</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-7 ml-auto" data-aos="fade-left" data-aos-delay="100">
                    <div class="tab-content">
                        <?php
                        $no = 0;
                        foreach ($agendanya as $agd) {
                            $no++;
                            if ($no == 1) {
                                $aktif = "active show";
                            } else {
                                $aktif = "";
                            }
                        ?>
                            <div class="tab-pane <?= $aktif ?>" id="tab-<?= $agd['id_agenda'] ?>">
                                <figure>
                                    <img src="<?= base_url() ?>asset/foto_agenda/<?= $agd['gambar'] ?>" alt="" class="img-fluid">
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <a href="<?= base_url() ?>agenda" class="btn btn-sm text-white offset-5" style="background: #06ba5a;">Lihat semua agenda</a>
            </div>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->

    <style>
        #ber {
            text-decoration: none;
            background-color: #06ba5a;
            color: white;
            padding: 8px;
            display: block;
            /*menjadikan elemen tipe blok*/
            width: 100px;
            text-align: center;
            border-radius: 8px;

        }
    </style>
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Berita dan Galeri <strong>STAINAA</strong></h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <!-- <li data-filter="*">ALL</li> -->
                        <li data-filter=".filter-berita" class="but filter-active ">Berita</li>
                        <li data-filter=".filter-galeri">Foto</li>
                        <li data-filter=".filter-video">Video</li>

                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                <?php
                $r = $this->db->from('berita')->order_by('id_berita', 'ASC')->limit(3)->get()->result_array();

                foreach ($r as $key) { ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-berita">
                        <img src="<?= base_url() ?>asset/foto_berita/<?= $key['gambar'] ?>" class="img-fluid" alt="">
                        <h5 class="mt-2"><?= $key['keterangan_gambar'] ?></h5>
                        <p><?= $key['sub_judul'] ?></p>
                        <a id="ber" href="<?= base_url() ?>berita/detail_berita/<?= $key['judul_seo'] ?>" class="details-link float-right small" title="More Details">Selengkapnya</a>
                    </div>
                <?php } ?>
                <?php
                $y =  $this->db->from('album')->order_by('id_album', 'DESC')->limit(3)->get()->result_array();

                foreach ($y as $j) { ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-galeri">
                        <img src="<?= base_url() ?>asset/img_album/<?= $j['gbr_album'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <a href="<?= base_url() ?>albums/detail/<?= $j['album_seo'] ?>">
                                <p><?= $j['jdl_album'] ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $gj =  $this->db->from('video')->order_by('id_video', 'DESC')->limit(3)->get()->result_array();

                foreach ($gj as $n) { ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-video">
                        <iframe src="<?= $n['youtube'] ?>" width="350" height="300" frameborder="0" allowfullscreen></iframe>
                        <!-- <img src="<?= base_url() ?>asset_web/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""> -->
                        <!-- <div class="portfolio-info">
                            <p><?= $n['jdl_video'] ?></p>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div> -->
                    </div>
                <?php } ?>


            </div>
            <div class="row portfolio-container" data-aos="fade-up">
                <a href="<?= base_url() ?>berita" class="offset-5 btn btn-sm text-white portfolio-item filter-berita" style="background: #06ba5a;">Lihat Semua Berita</a>
                <a href="<?= base_url() ?>albums" class="offset-5 btn btn-sm text-white portfolio-item filter-galeri" style="background: #06ba5a;">Lihat Semua Foto</a>
                <a href="<?= base_url() ?>video" class="offset-5 btn btn-sm text-white portfolio-item filter-video" style="background: #06ba5a;">Lihat Semua Video</a>
            </div>

        </div>
    </section><!-- End Portfolio Section -->
    <!-- <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Our <strong>Clients</strong></h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="<?= base_url() ?>asset_web/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section> -->
    <!-- End Our Clients Section -->

</main><!-- End #main -->