<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry entry-single" data-aos="fade-up">

                    <div class="entry-img">
                        <?php
                        if ($record['gambar'] != '') {
                            echo "<img  src='" . base_url() . "asset/foto_berita/$record[gambar]' alt='$record[judul]' class='img-fluid'></a>";
                        }
                        ?>
                        <!-- <img src="assets/img/blog-1.jpg" alt="" class="img-fluid"> -->
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html"><?php echo "$record[judul]"; ?></a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?php echo "$record[hari], " . tgl_indo($record['tanggal']) . ", $record[jam] WIB"; ?></time></a></li>
                            <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html"><?= $record['dibaca'] ?>View</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p><?= $record['isi_berita'] ?></p>


                    </div>

                    <div class="entry-footer clearfix">

                        <div class="float-right share">
                            <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                            <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                            <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                        </div>

                    </div>

                </article><!-- End blog entry -->


            </div><!-- End blog entries list -->



        </div>

    </div>
</section>