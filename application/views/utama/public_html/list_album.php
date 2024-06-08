<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row portfolio-container" data-aos="fade-up">
                <?php
                foreach ($album->result_array() as $value) { ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="<?= base_url() ?>asset/img_album/<?= $value['gbr_album'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <a href="<?= base_url() ?>albums/detail/<?= $value['album_seo'] ?>">
                                <p><?= $value['jdl_album'] ?></p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div id="blog" class="blog">
                <div class="blog-pagination mt-4">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>

        </div>
    </section>

</main>