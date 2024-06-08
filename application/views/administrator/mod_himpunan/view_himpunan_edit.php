<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Himpunan Terpilih</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_himpunan', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                    <tbody>
                      <input type='hidden' name='id' value='$rows[idhimpunan]'>
                      <tr><th width='120px' scope='row'>Nama Himpunan</th>   <td><input type='text' class='form-control' name='a' value='$rows[nama_himpunan]'></td></tr>
                      <tr><th scope='row'>Gambar</th>               <td><input type='file' class='form-control' name='b'>";
if ($rows['gambar'] != '') {
  echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='" . base_url() . "asset/gambar_artikel/cover_himpunan/$rows[gambar]'>$rows[gambar]</a>";
}
echo "</td></tr>
                      </td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='" . base_url() . "administrator/himpunan'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
