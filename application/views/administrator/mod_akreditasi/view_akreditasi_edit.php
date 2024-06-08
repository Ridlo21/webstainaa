<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Dosen Tetap</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_akreditasi', $attributes);
if ($rows["fakultas"] == "APT") {
    $t = "selected";
    $v = "";
    $s = "";
} elseif ($rows["fakultas"] == "PAI") {
    $v = "selected";
    $t = "";
    $s = "";
} else {
    $s = "selected";
    $t = "";
    $v = "";
}
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_akreditasi]'>
                    <tr><th width='120px' scope='row'>No Butir</th>   <td><input type='text' class='form-control' name='b' value='$rows[noButir]' required></td></tr>
                    <tr><th width='120px' scope='row'>Fakultas</th>   
                    <td><select name='a' class='form-control' required>
                        <option value='' selected>- Pilih  -</option>
                        <option $t value='APT' > APT  </option>
                        <option $v value='PAI' > PAI  </option>
                        <option $s value='HES' > HES  </option>";
echo "</td></tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
