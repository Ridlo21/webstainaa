<?php
echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data AKreditasi</h3>
                </div>
              <div class='box-body'>";
$attributes = array('class' => 'form-horizontal', 'role' => 'form');
echo form_open_multipart('administrator/tambah_akreditasi', $attributes);
echo "<div class='col-md-12'>

                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <tr><th width='120px' scope='row'>No butir</th>   <td><input type='text' class='form-control' name='b' required></td></tr>
                  <tr><th width='120px' scope='row'>Fakultas</th>   
                  <td><select name='a' class='form-control' required>
                  <option value='' selected>- Pilih  -</option>
                  <option value='APT' > APT  </option>
                  <option value='PAI' > PAI  </option>
                  <option value='HES' > HES  </option>";
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
