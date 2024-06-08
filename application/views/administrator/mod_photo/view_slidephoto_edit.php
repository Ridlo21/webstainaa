<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data User</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/edit_slidephoto', $attributes);
if ($rows['photo'] == '') {
  $foto = 'users.gif';
} else {
  $foto = $rows['photo'];
}
echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_photo]'>
                  
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='a'><hr style='margin:5px'>
                    <input type='text' class='form-control' name='b' value='$foto'>
                                                                                 <img class='img-thumbnail' style='height:60px' src='" . base_url() . "asset/foto_slide/$foto'></td></tr>
                  </tbody>
                  </table></div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
