<main id="main" class="main">
    <section class="blog" id="blog">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-8">
                    <article class="entry entry-single">

                        <div class="entry-img">
                            <img src="<?= base_url() ?>asset/gambar_artikel/foto_artikel/<?= $row['gambar'] ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a><?= $row['judul_artikel'] ?></a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $row['penulis'] ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= tgl_indo($row['tgl_rilis']) ?></time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <?= $row['isi_artikel'] ?>
                        </div>
                    </article>
                    <div class="blog-author d-flex align-items-center">
                        <img src="<?= base_url() ?>asset/gambar_artikel/foto_artikel/<?= $row['foto_penulis'] ?>" class="rounded-circle float-left" alt="">
                        <div>
                            <h4><?= $row['penulis'] ?></h4>
                            <div class="social-links">
                                <a href="#"><i class="bi bi-telephone"></i>&nbsp;<?= $row['kontak_penulis'] ?></a><br>
                                <a href="#"><i class="bi bi-envelope"></i>&nbsp;<?= $row['email'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Artikel Terkini</h3>
                        <div class="sidebar-item recent-posts">
                            <?php
                            foreach ($artikel->result_array() as $value) {
                            ?>
                                <div class="post-item clearfix">
                                    <img src="<?= base_url() ?>asset/gambar_artikel/foto_artikel/<?= $value['gambar'] ?>" alt="">
                                    <h4><a href="<?= base_url() ?>artikel/detail/<?= $value['nama_himpunan'] ?>/<?= $value['judul_seo'] ?>"><?= $value['judul_artikel'] ?></a></h4>
                                    <time datetime="2020-01-01"><?= tgl_indo($value['tgl_rilis']) ?></time>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>