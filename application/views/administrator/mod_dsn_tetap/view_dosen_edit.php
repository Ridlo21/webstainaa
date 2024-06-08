<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Dosen Tetap</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_dosen_tetap', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[iddosen]'>
                    <tr><th width='120px' scope='row'>Nidn</th>   <td><input type='number' class='form-control' name='a' value='$rows[nidn]' required></td></tr>
                    <tr><th width='120px' scope='row'>Nama Lengkap</th>   <td><input type='text' class='form-control' name='b' value='$rows[namalengkap]' required></td></tr>
                    <tr><th width='120px' scope='row'>Profil</th>   
                    <td><select name='c' class='form-control' required>
                                                  <option value='' selected>- Pilih  -</option>";
foreach ($record->result_array() as $row) {
  if ($rows['id_idn'] == $row['id_idn']) {
    echo "<option value='$row[id_idn]' selected>$row[nama]</option>";
  } else {
    echo "<option value='$row[id_idn]'>$row[nama]</option>";
  }
}
echo "</td>
                    </tr>
                    <tr><th scope='row'>Blokir</th>                   <td>";
if ($rows['status'] == 'Aktif') {
  echo "<input type='radio' name='d' value='Aktif' checked> Aktif &nbsp; <input type='radio' name='d' value='Tidak Aktif'> Tidak Aktif";
} else {
  echo "<input type='radio' name='d' value='Aktif' > Aktif &nbsp; <input type='radio' name='d' value='Tidak Aktif' checked> Tidak Aktif";
}
echo "</td></tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
