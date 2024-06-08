            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manajemen Users</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_struktur'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tgl Diangkat</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($record as $row) {
                        if ($row['foto'] == '') {
                          $foto = 'users.gif';
                        } else {
                          $foto = $row['foto'];
                        }
                        echo "<tr><td>$no</td>
                              <td>$row[nama]</td>
                              <td>$row[jabatan]</td>
                              <td>$row[tgl_diangkat]</td>
                              <td><img style='border:1px solid #cecece' width='40px' class='img-circle' src='" . base_url() . "asset/foto_struktur/$foto'></td>
                              <td>$row[status]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='" . base_url() . "administrator/edit_struktur/$row[id_struktur]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='" . base_url() . "administrator/delete_struktur/$row[id_struktur]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>