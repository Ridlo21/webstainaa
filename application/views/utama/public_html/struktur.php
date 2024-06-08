<main id="main">
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="row">
                <?php
                $qry = $this->db->from('struktur')->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->order_by('id_struktur', 'ASC')->limit(4)->get()->result_array();
                foreach ($qry as $t) { ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="<?= base_url() ?>asset/foto_struktur/<?= $t['foto'] ?>" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4> <?= $t['nama'] ?></h4>
                                <span><?= $t['jabatan'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </section>


    <section id="blog" class="blog">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry" data-aos="fade-up">
                        <div class="entry-content">
                            <strong>Struktur Organisasi Sekolah Tinggi Agama Islam Nurul Abror Al-Robbaniyin</strong> <br> <br>
                            <strong>Lembaga dan Unit kerja</strong>
                            <?php
                            $data = $this->db->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->get_where('struktur', ['jabatan.jabatan' => 'Lembaga Penjamin Mutu Internal'])->row_array();
                            $d = $this->db->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->get_where('struktur', ['jabatan.jabatan' => 'LP3M'])->row_array();
                            ?>


                            <p><i class="bx bx-chevron-right"></i> <?= $data['jabatan'] ?><a href="#"> : <?= $data['nama'] ?></a></p>
                            <?php
                            $qry = $this->db->from('struktur')->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->limit(2, 5)->get()->result_array();
                            foreach ($qry as $key) { ?>
                                <ul>
                                    <li style="list-style-type:none;"><i class="bx bx-chevron-right"></i> <?= $key['jabatan'] ?> <a href="#"> : <?= $key['nama'] ?></a></li>
                                </ul>
                            <?php } ?>

                            <p><i class="bx bx-chevron-right"></i> <?= $d['jabatan'] ?> <a href="#"> : <?= $d['nama'] ?></a></p>
                            <?php
                            $qr = $this->db->from('struktur')->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->limit(3, 8)->get()->result_array();
                            foreach ($qr as $y) { ?>
                                <ul>
                                    <li style="list-style-type:none;"><i class="bx bx-chevron-right"></i> <?= $y['jabatan'] ?> <a href="#">: <?= $y['nama'] ?></a></li>
                                </ul>
                            <?php } ?>


                            <?php
                            $uu = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
                            $jk = $this->db->from('struktur')->join('jabatan', 'jabatan.id_jabatan=struktur.id_jabatan')->where_not_in('jabatan.id_jabatan', $uu)->get()->result_array();
                            foreach ($jk as $row) { ?>
                                <p><i class="bx bx-chevron-right"></i> <?= $row['jabatan'] ?> :<a href="#"> <?= $row['nama'] ?></a></p>
                            <?php } ?>
                        </div>

                    </article><!-- End blog entry -->



                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar" data-aos="fade-left">
                        <a href="">
                            <h5>Profil STAINAA </h5>
                        </a>
                        <div class="sidebar-item categories">
                            <p>
                                Di era globalisasi ini, menuntut multi menejemen di berbagai aspek kehidupan,
                                yang dilaksanakan secara professional yang mempunyai karakteristik efektivitas,
                                efisien, dan akuntabilitas serta berkesinambungan. Tuntutan ini juga sangat
                                diperlukan dalam pengelolaan Perguruan Tinggi agar dapat dipertanggungjawabkan
                                secara moral dan spiritual,
                                <a href="<?= base_url() ?>utama/profilstainaa">...selengkapnya</a>

                            </p>
                        </div><!-- End sidebar categories-->
                        <a href="">
                            <h5>Visi , Misi</h5>
                        </a>
                        <div class="sidebar-item categories">
                            <p>
                                Visi STAINAA adalah menjadi Perguruan Tinggi unggul, inovatif, berkeadaban dan berkarakter dalam pengembangan ilmu keislaman, pengetahuan umum dan teknologi;
                                <a href="<?= base_url() ?>utama/visimisi">...selengkapnya</a>

                            </p>
                        </div>
                        <a href="">
                            <h5>Tujuan </h5>
                        </a>
                        <div class="sidebar-item categories">
                            <p>
                                Tujuan STAINAA adalah: <br>
                                1. Menjadikan STAINAA sebagai perguruan tinggi terakreditasi unggul dan bertaraf internasonal. <br>
                                2. Menciptakan iklim akademik berbasis riset. <br>
                                3. Menciptakan proses pembelajaran yang inovatif, kooperatif, dan kolaboratif.
                                <a href="<?= base_url() ?>utama/tujuan">...selengkapnya</a>

                            </p>
                        </div>
                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->