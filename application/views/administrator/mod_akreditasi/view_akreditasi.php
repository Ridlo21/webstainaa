            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Akreditasi</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_akreditasi'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Fakultas</th>
                        <th>NO Butir</th>
                        <th>jumlah Link</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($record as $row) {?>
                        <tr><td><?= $no++;?></td>
                              <td><?=$row["fakultas"]?></td>
                              <td><?=$row["noButir"]?></td>
                              <td><?=$this->model_akreditasi->detail_akreditasi($row["id_akreditasi"])?></td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='edit_akreditasi/<?= $row["id_akreditasi"] ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='hapus_akreditasi/<?= $row["id_akreditasi"] ?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                                <a class='btn btn-primary btn-xs' title='Setting Data' href='setting_akreditasi/<?= $row["id_akreditasi"] ?>'><span class='glyphicon glyphicon-cog'></span></a>
                              </center></td>
                          </tr>
                       
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>