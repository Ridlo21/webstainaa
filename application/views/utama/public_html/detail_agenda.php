<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry" data-aos="fade-up">

                    <div class="entry-img">
                        <img src="<?= base_url() ?>asset/foto_agenda/<?= $record['gambar'] ?>" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a><?= $record['tema'] ?></a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-building-alt"></i><a> Tempat </a>&nbsp;<a href="#"><?= $record['tempat'] ?></a></li>
                            <li class="d-flex align-items-center"><i class="icofont-calendar"></i> <a href="#"><?= tgl_indo($record['tgl_mulai']) ?></a></li>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="#"><?= $record['pengirim'] ?></a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p><? ?></p>
                        <?= $record['isi_agenda'] ?>
                    </div>

                </article>


            </div><!-- End blog entries list -->


        </div>

    </div>
</section><!-- End Blog Section -->