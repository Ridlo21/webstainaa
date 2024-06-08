<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(<?php echo base_url(); ?>asset/gambar_artikel/cover_himpunan/<?= $himpunan['gambar'] ?>);"></div>

        </div>

    </div>
</section>

<main id="main" class="main">
    <section class="blog" id="blog">
        <div class="container">
            <div class="row">
                <?php
                foreach ($artikel->result_array() as $value) {
                ?>
                    <div class="col-lg-4">
                        <article class="entry entry-single mt-3">

                            <div class="entry-img">
                                <img src="<?= base_url() ?>asset/gambar_artikel/foto_artikel/<?= $value['gambar'] ?>" alt="" class="img-fluid">
                            </div>

                            <h5 class="entry-title" style="font-size: medium !important;">
                                <a href="<?= base_url() ?>artikel/detail/<?= $value['nama_himpunan'] ?>/<?= $value['judul_seo'] ?>"><?= $value['judul_artikel'] ?> </a>
                            </h5>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a><?= $value['penulis'] ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="2020-01-01"><?= tgl_indo($value['tgl_rilis']) ?></time></a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                <?php
                }
                ?>
                <div class="blog-pagination offset-5 mt-4">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</main>