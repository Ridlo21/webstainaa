<main id="main">
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <h3 class="text-center" style="margin-bottom: 3%; font-style: oblique;">Berita</h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="sidebar" data-aos="fade-left">
                        <div class="sidebar-item recent-posts">
                            <?php
                            foreach ($berita->result_array() as $value) {
                                $tgl = tgl_indo($value['tanggal']);
                                $isi_berita = (strip_tags($value['isi_berita']));
                                $isi = substr($isi_berita, 0, 200);
                                $isi = substr($isi_berita, 0, strrpos($isi, " "));
                            ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url() ?>asset/foto_berita/<?= $value['gambar'] ?>" alt="">
                                    <h4><a href="<?= base_url() ?>berita/detail_berita/<?= $value['judul_seo'] ?>"><?= $value['judul'] ?></a></h4>
                                    <time datetime=""><?= $tgl ?></time><br>
                                    <p><?= $isi ?></p>
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