<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Lowongan Pekerjaan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_lowker',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Judul</th>    <td><input type='text' class='form-control' name='a' required></td></tr>
                    <tr><th width='120px' scope='row'>Perusahaan</th>    <td><input type='text' class='form-control' name='b' required></td></tr>
                    <tr><th width='120px' scope='row'>Deskripsi</th>    <td><textarea id='editor1' class='form-control' name='c' style='height:80px' required></textarea></td></tr>
                    <tr><th width='120px' scope='row'>Posisi</th>    <td><input type='text' class='form-control' name='d' required></td></tr>
                    <tr><th width='120px' scope='row'>Deadline</th>    <td><input type='text' class='datepicker form-control' name='e' data-date-format='dd-mm-yyyy' name='c' value='".date('d-m-Y')."' required></td></tr>
                    <tr><th width='120px' scope='row'>Keterangan</th>    <td><textarea id='editor1' class='form-control' name='f' style='height:80px' required></textarea></td></tr>
                    <tr><th width='120px' scope='row'>Cari File</th>    <td><input type='file' class='form-control' name='g'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
