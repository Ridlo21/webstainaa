<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Dosen Tetap</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/tambah_dosen_tetap', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <tr><th width='120px' scope='row'>Nidn</th>   <td><input type='number' class='form-control' name='a' required></td></tr>
                  <tr><th width='120px' scope='row'>Nama Lengkap</th>   <td><input type='text' class='form-control' name='b' required></td></tr>

                  <tr><th width='120px' scope='row'>Profil</th>   
                  <td><select name='c' class='form-control' required>
                  <option value='' selected>- Pilih  -</option>";
foreach ($record->result_array() as $row) {
  echo "<option value='$row[id_idn]'>$row[nama]</option>";
}
echo "</td>
                  </tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
