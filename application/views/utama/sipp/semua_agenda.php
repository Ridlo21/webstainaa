<main id="main">
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <h3 class="text-center" style="margin-bottom: 3%; font-style: oblique;">Agenda</h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="sidebar" data-aos="fade-left">
                        <div class="sidebar-item recent-posts">
                            <?php
                            foreach ($agenda->result_array() as $value) {
                                $tgl = tgl_indo($value['tgl_mulai']);
                                $isi_agd = (strip_tags($value['isi_agenda']));
                                $isi = substr($isi_agd, 0, 200);
                                $isi = substr($isi_agd, 0, strrpos($isi, " "));
                                $isi_agendanya = $isi;
                            ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url() ?>asset/foto_agenda/<?= $value['gambar'] ?>" alt="">
                                    <h4><a href="<?= base_url() ?>agenda/detail/<?= $value['tema_seo'] ?>"><?= $value['tema'] ?></a></h4>
                                    <time datetime=""><?= $tgl ?></time><br>
                                    <p><?= $isi_agendanya ?></p>
                                </div>

                            <?php } ?>
                            <div class="blog-pagination mt-4">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>