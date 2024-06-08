<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Identitas (Multilevel)</h3>
            <a class='pull-right btn btn-primary btn-sm' href='<?= base_url() ?>administrator/tambah_idn'>Tambahkan Data</a>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($record as $row) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td>
                                <center>
                                    <a class="btn btn-success btn-xs" title="Edit Data" href="<?= base_url() ?>administrator/edit_idn/<?= $row->id_idn ?>"><span class='glyphicon glyphicon-edit'></span></a>
                                    <a class="btn btn-danger btn-xs" title="Delete Data" href="<?= base_url() ?>administrator/delete_idn/<?= $row->id_idn ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                                </center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>