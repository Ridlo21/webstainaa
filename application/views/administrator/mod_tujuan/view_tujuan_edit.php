<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Tujuan</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_tujuan', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[idtujuan]'>
                    <tr><th width='120px' scope='row'>Profil</th>   
                    <td><select name='a' class='form-control' required>
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
                  <tr><th scope='row'>Isi Tujuan</th>           <td><textarea id='editor1' class='form-control' name='b' style='height:260px'>$rows[isi]</textarea></td></tr>
                   
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
