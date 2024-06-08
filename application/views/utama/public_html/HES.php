<main id="main">
    <section id="about-us" class="about-us" style="margin-top: -60px;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 pl-0 pl-lg-5 pr-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up">Pendidikan Agama Islam</h3>
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up">
                                <!-- <i class="bx bx-receipt"></i> -->
                                <h4>Profil HES </h4>
                                <p class="text-justify">
                                    <?php
                                    $this->db->from('profile');
                                    $this->db->join('idn', 'idn.id_idn=profile.id_idn');
                                    // $this->db->where('visi_misi', 'visi');
                                    $this->db->where('nama', 'HES');
                                    $query = $this->db->get()->row_array();
                                    echo $query['isi'];
                                    ?>
                                </p>

                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <!-- <i class="bx bx-cube-alt"></i> -->
                                <h4>Visi Misi HES</h4>
                                <p class="text-justify">
                                    <span style="font-size: 18px;"><b>Visi</b></span>
                                    <?php
                                    $this->db->from('visi_misi');
                                    $this->db->join('idn', 'idn.id_idn=visi_misi.id_idn');
                                    $this->db->where('visi_misi', 'visi');
                                    $this->db->where('nama', 'HES');
                                    $query = $this->db->get()->row_array();
                                    echo $query['isi'];
                                    ?>
                                </p>
                                <p class="text-justify mt-3">
                                    <span style="font-size: 18px;"><b>Misi</b></span>
                                    <?php
                                    $this->db->from('visi_misi');
                                    $this->db->join('idn', 'idn.id_idn=visi_misi.id_idn');
                                    $this->db->where('visi_misi', 'misi');
                                    $this->db->where('nama', 'HES');
                                    $query = $this->db->get()->row_array();
                                    echo $query['isi'];
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <!-- <i class="bx bx-images"></i> -->
                                <h4>Tujuan HES</h4>
                                <p class="text-justify">
                                    <?php
                                    $this->db->from('tujuan');
                                    $this->db->join('idn', 'idn.id_idn=tujuan.id_idn');
                                    $this->db->where('nama', 'HES');
                                    $query = $this->db->get()->row_array();
                                    echo $query['isi'];
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <!-- <i class="bx bx-shield"></i> -->
                                <h4>Dosen Tetap HES</h4>
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
                                        $data = $this->db->get_where('dosen_tetap', ["id_idn" => '3']);
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