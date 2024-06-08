<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Berita Baru</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_menugrouplist',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Group Menu</th>   <td><select name='a' class='form-control' required>
                                                                            <option value='' selected>- Pilih Group Menu -</option>";
                                                                            foreach ($record->result_array() as $row){
                                                                                echo "<option value='$row[id_group_menu]'>$row[nama_group_menu]</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Nama Menu</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th scope='row'>URL Menu</th>    <td><input type='text' class='form-control' name='c' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
