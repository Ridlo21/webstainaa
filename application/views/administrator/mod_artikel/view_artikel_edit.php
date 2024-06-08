<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Artikel Baru</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_artikel', $attributes);
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                    <tbody>
                      <input type='hidden' name='id' value='$rows[idartikel]'>
                      <tr><th width='120px' scope='row'>Judul</th>   <td><input type='text' class='form-control' name='a' required value='$rows[judul_artikel]'></td></tr>
                      <tr><th scope='row'>Isi Artikel</th>           <td><textarea id='editor1' class='form-control' name='b' style='height:260px' required>$rows[isi_artikel]</textarea></td></tr>
                      <tr><th scope='row'>Gambar</th>               <td><input type='file' class='form-control' name='c'>";
if ($rows['gambar'] != '') {
  echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='" . base_url() . "asset/gambar_artikel/foto_artikel/$rows[gambar]'>$rows[gambar]</a>";
}
echo "</td></tr><tr><th scope='row'>Himpunan</th>               <td>
                      <select name='d' class='form-control' required>
                      <option value='' selected>- Pilih Himpunan -</option>";
foreach ($record->result_array() as $row) {
  if ($rows['nama_himpunan'] == $row['nama_himpunan']) {
    $select = "selected";
  } else {
    $select = "";
  }
  echo "<option $select value='$row[nama_himpunan]'>$row[nama_himpunan]</option>";
}
echo "</select>
                      </td></tr>
                      <tr><th scope='row'>Penulis</th>               <td><input type='text' class='form-control' name='e' required value='$rows[penulis]'></td></tr>
                      <tr><th scope='row'>Foto Penulis</th>         <td><input type='file' class='form-control' name='f' >";
if ($rows['foto_penulis'] != '') {
  echo "<i style='color:red'>Lihat Gambar Saat ini : </i><a target='_BLANK' href='" . base_url() . "asset/gambar_artikel/foto_artikel/$rows[foto_penulis]'>$rows[foto_penulis]</a>";
}
echo "</td></tr>
                      <tr><th scope='row'>Email</th>                <td><input type='email' class='form-control' name='g' required value='$rows[email]'></td></tr>
                      <tr><th scope='row'>Kontak Penulis</th>             <td><input type='number' class='form-control' name='h' required value='$rows[kontak_penulis]'></td></tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
