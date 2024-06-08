<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Data Akreditasi</h3>
      <div class="card">
        <div class="card-body">
          <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">Tambahkan Data</button>
            <a class='pull-right btn btn-danger btn-sm' href='<?php echo base_url(); ?>administrator/akreditasi'>Kembali</a>
            <div class="col-md-6 mb-4">
              <span>
                <h4>Detail Akreditasi Fakultas <?= $rows["fakultas"]?> dengan no butir <?= $rows["noButir"]?></h4>
                <h4>Silahkan Mengisi Link Sesuai Ketentuan yang berlaku </h4>
              </span>
            </div>
          </div>

        </div>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:20px'>No</th>
            <th>Fakultas</th>
            <th>NO Butir</th>
            <th>Link</th>
            <th>keterangan</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($record as $row) {?>
            <tr><td><?= $no++;?></td>
                  <td><?=$row["fakultas"]?></td>
                  <td><?=$row["noButir"]?></td>
                  <td>
                    <a href=" <?= $row["link"]?>" target="_blank"> <?= $row["link"]?></a>
                  </td>
                  <td><?= $row["keterangan"]?></td>
                  <td>
                    <center>
                    <a class='btn btn-danger btn-xs' title='Delete Data' href='<?= base_url() ?>/administrator/hapus_detail_akreditasi/<?= $row["id_detail"] ?>/<?=$rows["id_akreditasi"]?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class='glyphicon glyphicon-remove'></span></a>
                  </center>
                </td>
              </tr>
            
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Detail Akreditasi</h4>
      </div>
      <div class="modal-body">
        <?php
        $attributes = array('class' => 'form-horizontal', 'role' => 'form');
        echo form_open_multipart('administrator/tambah_detail_akreditasi', $attributes);
        echo "<div class='col-md-12'>
        <input type='hidden' class='form-control' name='id' value='$rows[id_akreditasi]' required>
                          <table class='table table-condensed table-bordered'>
                          <tbody>
                          <tbody>
                  <tr><th width='120px' scope='row'>Link</th><td><input type='text' class='form-control' name='a' required></td></tr>
                  <tr><th width='120px' scope='row'>keterangan</th><td><input type='text' class='form-control' name='b' required></td></tr>";
        echo "</td>
                          </tr>
                          </tbody>
                          </table></div>
                      </div>
                      <div class='box-footer'>
                            <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                            
                          </div>
                    </div>";
        ?>
    </div>
  </div>
</div>