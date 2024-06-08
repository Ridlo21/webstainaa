<main id="main">
    <section id="about-us" class="about-us" style="margin-top: -60px;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 pl-0 pl-lg-5 pr-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up">Pendidikan Agama Islam</h3>
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up">
                                <h4>Profil PAI </h4>
                                <p class="text-justify">
                                    <?php
                                    $data = $this->db->get_where('profile', ["id_idn" => '2'])->row_array();
                                    echo $data['isi'];
                                    ?>
                                </p>

                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <h4>Visi Misi PAI</h4>
                                <h5>Visi</h5>

                                <?php
                                $data = $this->db->get_where('visi_misi', ["id_idn" => '2', "visi_misi" => 'visi']);
                                foreach ($data->result_array() as $key) { ?>
                                    <p class="text-justify">
                                        <?= $key['isi'] ?>
                                    </p>
                                <?php }
                                ?>

                                <h5>Misi</h5>
                                <?php
                                $data = $this->db->get_where('visi_misi', ["id_idn" => '2', "visi_misi" => 'misi']);
                                foreach ($data->result_array() as $key) { ?>
                                    <p class="text-justify">
                                        <?= $key['isi'] ?>
                                    </p>
                                <?php }
                                ?>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <!-- <i class="bx bx-images"></i> -->
                                <h4>Tujuan PAI</h4>
                                <p class="text-justify">
                                    <?php
                                    $data = $this->db->get_where('tujuan', ["id_idn" => '2'])->row_array();
                                    echo $data['isi'];
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <h4>Dosen Tetap PAI</h4>
                                <table border="0" cellpadding="10">
                                    <thead>
                                        <tr>
                                            <th style='width:20px'>No</th>
                                            <th>Nidn</th>
                                            <th>Nama</th>
                                            <!-- <th>Prodi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $data = $this->db->get_where('dosen_tetap', ["id_idn" => '2']);
                                        $no = 1;
                                        foreach ($data->result_array() as $key) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $key['nidn'] ?></td>
                                                <td><?= $key['namalengkap'] ?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section>
</main>