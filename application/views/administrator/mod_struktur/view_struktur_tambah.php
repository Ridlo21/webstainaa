<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data User</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/tambah_struktur', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>nama</th>   <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th width='120px' scope='row'>Jabatan</th>   
                    <td><select name='b' class='form-control' required>
                                                  <option value='' selected>- Pilih jabatan -</option>";
foreach ($record->result_array() as $row) {
  echo "<option value='$row[id_jabatan]'>$row[jabatan]</option>";
}
echo "</td>
                    </tr>
                    <tr><th scope='row'>Tgl Diangkat</th>             <td><input type='date' class='form-control' name='c' required></td></tr>
                    <tr><th scope='row'>Foto</th>                     <td><input type='file' class='form-control' name='d'></td></tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
