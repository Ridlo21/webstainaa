<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit File Download</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_lowker',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[id_lowongan]'>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='a' value='$rows[judul]' required></td></tr>
                    <tr><th width='120px' scope='row'>Perusahaan</th>    <td><input type='text' class='form-control' name='b' value='$rows[nama_perusahaan]' required></td></tr>
                    <tr><th width='120px' scope='row'>Deskripsi</th>    <td><textarea id='editor1' class='form-control' name='c' style='height:80px' required>$rows[deskripsi_perusahaan]</textarea></td></tr>
                    <tr><th width='120px' scope='row'>Posisi</th>    <td><input type='text' class='form-control' name='d' value='$rows[posisi]' required></td></tr>
                    <tr><th width='120px' scope='row'>Deadline</th>    <td><input type='text' class='datepicker form-control' name='e' data-date-format='dd-mm-yyyy' value='".tgl_view($rows['deadline'])."' required></td></tr>
                    <tr><th width='120px' scope='row'>Keterangan</th>    <td><textarea id='editor1' class='form-control' name='f' style='height:80px' required>$rows[keterangan]</textarea></td></tr>
                    <tr><th width='120px' scope='row'>Cari File</th>    <td><input type='file' class='form-control' name='g'>";
                                                                        if ($rows['file_pendukung'] != ''){ echo "File : <a target='_BLANK' href='".base_url()."lowongan/file/$rows[file_pendukung]'>$rows[file_pendukung]</a>"; } echo "</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
