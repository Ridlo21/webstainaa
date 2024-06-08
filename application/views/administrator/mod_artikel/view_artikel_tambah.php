<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Artikel Baru</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/tambah_artikel', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                    <tbody>
                      <input type='hidden' name='id' value=''>
                      <tr><th width='120px' scope='row'>Judul</th>   <td><input type='text' class='form-control' name='a' required></td></tr>
                      <tr><th scope='row'>Isi Artikel</th>           <td><textarea id='editor1' class='form-control' name='b' style='height:260px' required></textarea></td></tr>
                      <tr><th scope='row'>Gambar</th>               <td><input type='file' class='form-control' name='c' required></td></tr>
                      <tr><th scope='row'>Himpunan</th>               <td>
                      <select name='d' class='form-control' required>
                      <option value='' selected>- Pilih Himpunan -</option>";
foreach ($record->result_array() as $row) {
  echo "<option value='$row[nama_himpunan]'>$row[nama_himpunan]</option>";
}
echo "</select>
                      </td></tr>
                      <tr><th scope='row'>Penulis</th>               <td><input type='text' class='form-control' name='e' required></td></tr>
                      <tr><th scope='row'>Foto Penulis</th>         <td><input type='file' class='form-control' name='f'></td></tr>
                      <tr><th scope='row'>Email</th>                <td><input type='email' class='form-control' name='g' required></td></tr>
                      <tr><th scope='row'>Kontak Penulis</th>             <td><input type='number' class='form-control' name='h' required></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
