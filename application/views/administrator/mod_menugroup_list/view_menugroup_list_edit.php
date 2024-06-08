<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Berita Terpilih</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_menugrouplist',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_group_menu_list]'>
                    <tr><th width='120px' scope='row'>Group Menu</th>   <td><select name='a' class='form-control' required>";
                                                                            foreach ($record->result_array() as $row){
                                                                              if ($rows['id_group_menu'] == $row['id_group_menu']){
                                                                                echo "<option value='$row[id_group_menu]' selected>$row[nama_group_menu]</option>";
                                                                              }else{
                                                                                echo "<option value='$row[id_group_menu]'>$row[nama_group_menu]</option>";
                                                                              }
                                                                            }
                    echo "</td></tr>
                    <tr><th scope='row'>Nama Menu</th>    <td><input type='text' class='form-control' name='b' value='$rows[nama]' required></td></tr>
                    <tr><th scope='row'>URL Menu</th>    <td><input type='text' class='form-control' name='c' value='$rows[link]' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
