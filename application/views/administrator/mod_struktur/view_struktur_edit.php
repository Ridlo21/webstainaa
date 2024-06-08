<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data User</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_struktur', $attributes);
if ($rows['foto'] == '') {
  $foto = 'users.gif';
} else {
  $foto = $rows['foto'];
}
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_struktur]'>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' value='$rows[nama]'></td></tr>
                    <tr><th width='120px' scope='row'>Jabatan</th>   
                    <td><select name='b' class='form-control' required>
                                                  <option value='' selected>- Pilih jabatan -</option>";
foreach ($record->result_array() as $row) {
  if ($rows['id_jabatan'] == $row['id_jabatan']) {
    echo "<option value='$row[id_jabatan]' selected>$row[jabatan]</option>";
  } else {
    echo "<option value='$row[id_jabatan]'>$row[jabatan]</option>";
  }
}
echo "</td>
                    </tr>
                    <tr><th scope='row'>Tgl Diangkat</th>                    <td><input type='date' class='form-control' name='c' value='$rows[tgl_diangkat]'></td></tr>
                   
                    <tr><th scope='row'>Blokir</th>                   <td>";
if ($rows['status'] == 'Aktif') {
  echo "<input type='radio' name='d' value='Aktif' checked> Aktif &nbsp; <input type='radio' name='d' value='Tidak Aktif'> Tidak";
} else {
  echo "<input type='radio' name='d' value='Aktif'> Ya &nbsp; <input type='radio' name='d' value='Tidak Aktif' checked> Tidak";
}
echo "</td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='e'><hr style='margin:5px'>
                    <input type='hidden' class='form-control' name='f' value='$rows[foto]'>
                                                                                 <img class='img-thumbnail' style='height:60px' src='" . base_url() . "asset/foto_struktur/$rows[foto]'></td></tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
