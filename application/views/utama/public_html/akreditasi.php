<main id="main">
    <section id="services" class="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>fakultas</th>
                                <th>no butir</th>
                                <th>Link</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($akreditasi_data->result_array() as $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['fakultas'] ?></td>
                                    <td><?= $value['noButir'] ?></td>
                                    <td><?php
                                    $this->
                                    
                                    ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
</main>